<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Ledger;
use App\Models\Artifact;
use App\Models\User;
use App\Models\T3Calls;
use RealRashid\SweetAlert\Facades\Alert;

class KPIController extends Controller
{
    public function kpi_users()
    {
        // GET ALL PROJECT MANAGERS
        $pms = User::where('role','=',1)->where('active','=',1)->get();

        foreach ($pms as $key => $value) {
            $projects_cpi = Project::where('pm','=',$value->id_user)->where('status','=',1)->orWhere('status','=',2)->avg('cpi');
            $projects_spi = Project::where('pm','=',$value->id_user)->where('status','=',1)->orWhere('status','=',2)->avg('spi');
            $projects_fw = Project::where('pm','=',$value->id_user)->where('status','=',1)->orWhere('status','=',2)->avg('fw');

            $pm_save = User::findOrFail($value->id_user);
            $pm_save->cpi = $projects_cpi;
            $pm_save->spi = $projects_spi;
            $pm_save->fw = $projects_fw;
            $pm_save->save();
        }

    }


    // Automatically update the KPIs of all projects (CPI, EV, SPI, EV, Perfomance)
    public function kpi_projects()
    {
        // Check if PMO Head, if not, redirect back
        if( auth()->user()->role == 2 ){

            $auth_result = $this->CallAPI("POST", "https://absi-t3.hcx.com.ph/custom-time-tracker-api/public/api/users/login", array("password"=> env('T3_PASSWORD'),"username"=> env('T3_USERNAME')));
            $auth_arr = json_decode($auth_result);

            // $prj_result = $this->CallAPI("POST", "https://absi-t3.hcx.com.ph/custom-time-tracker-api/public/api/custom/financials", array("project_id"=> "1242"), ["Api-Token: ".$auth_arr->data->api_token]);
            // $prj_arr = json_decode($prj_result);

            // var_dump($prj_arr->data->actual_cost); exit;

            // var_dump($prj_arr->data->api_token); exit;
            // 1. GET ALL ON-GOING PROJECTS
            $active_projects = Project::where('status',1)->get();

            // 2. FOR EACH OF THE PROJECT, UPDATE KPIs
            foreach ($active_projects as $key => $value) {

                // FOR COST PERFORMANCE INDEX (CPI)
                // 2.1 CHECK IF ACTIVE PROJECT HAS T3 ID
                if ($value->t3_id){
                    
                    // CALL API TO GET T3 FULLY LOADED AND ACTUALS
                    $prj_result = $this->CallAPI("POST", "https://absi-t3.hcx.com.ph/custom-time-tracker-api/public/api/custom/financials", array("project_id"=> $value->t3_id), ["Api-Token: ".$auth_arr->data->api_token]);
                    $prj_arr = json_decode($prj_result);

                    // SAVE PROJECT ID AND RESPONSE IN T3 TABLE
                    T3Calls::create(['project_id'=>$value->id,'project_name'=>$value->short_name,'response'=>$prj_result]);

                    // IF STATUS CODE OF T3 API CALL IS 200
                    if($prj_arr->status_code = 200){

                        // INITIALIZE ACTUAL COST AND BUDGET VARIABLES
                        $actual_cost = $prj_arr->data->actual_cost;
                        $fully_loaded_cost = $prj_arr->data->fully_loaded_cost;

                        // GET EARNED COST VALUE OF THE PROJECT (Actual Budget * Progress)
                        $earned_value = $fully_loaded_cost * ($value->progress/100);

                        // GET ACTUAL CPI OF THE PROJECT (Earned Cost Value / Actual Cost)
                        $cpi = 0;       
                        if ($actual_cost != 0){ 
                            $cpi = $earned_value / $actual_cost;
                        }
                        
                        // SAVE CPI
                        $project_budget_save = Project::findOrFail($value->id);
                        $project_budget_save->cpi = $cpi;
                        $project_budget_save->budget = $fully_loaded_cost;
                        $project_budget_save->actual_cost = $actual_cost;
                        $project_budget_save->save();

                    }
                    
                }

                // 2.5 SPI - GET ACTUAL CURRENT DURATION
                $now = time();
                $p_start = strtotime($value->p_start);
                $p_live = strtotime($value->p_live);
                $datediff_now = $now - $p_start;

                // 2.6 SPI - GET CONSUMED MANDAYS (From Planned Start to Today)
                $datediff_p = $p_live - $p_start; // difference versus planned live and planned start (actual planned duration)

                // 2.7 SPI - CONVERT VARIABLES FROM TIME TO DAYS
                $spi_now = round($datediff_now / (60 * 60 * 24));
                $spi_p = round($datediff_p / (60 * 60 * 24));

                // 2.8 SPI - GET EARNED MANDAYS VALUE OF THE PROJECT
                $spi_progress = $spi_p * ($value->progress/100);

                // 2.9 SPI - GET ACTUAL SPI OF THE PROJECT (Earned Mandays Value / Consumed Mandays)
                $spi = 0;
                if ($spi_now != 0){
                    $spi = $spi_progress / $spi_now;
                }

                // 2.10 FW - GET ALL ARTIFACTS (With or Without Attachment)
                $all_arts = Artifact::where('project_id',$value->id)->where('artifact_type',1)->get()->count();
                $complete_arts = Artifact::where('project_id',$value->id)->where('artifact_type',1)->whereNotNull('link')->get()->count();

                // 2.11 FW - GET ACTUAL FW RATE OF THE PROJECT (With Link Artifacts / All Artifacts)
                $fw = 0;
                if($all_arts != 0){
                    $fw = $complete_arts / $all_arts;
                }

                // 2.12 SAVE PROJECT
                $project_save = Project::findOrFail($value->id);
                $project_save->spi = $spi;
                $project_save->fw = $fw;
                $project_save->save();
            }
            
            // UPDATE KPI OF PROJECT MANAGERS
            $this->kpi_users();

            Alert::success('Success', 'KPIs of Projects have been successfully updated.');
            return redirect('/');
        } else {
            Alert::error('Error', 'You do not have the permission to perform this action.');
            return redirect('/');
        }
    }
    // Method: POST, PUT, GET etc
    // Data: array("param" => "value") ==> index.php?param=value

    public function CallAPI($method, $url, $data = false, $headers = false){
        $curl = curl_init();

        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        if ($headers){
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }

        // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

    
}
