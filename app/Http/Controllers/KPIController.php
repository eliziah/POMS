<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Ledger;
use App\Models\Artifact;
use App\Models\User;
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


            // 1. GET ALL ON-GOING PROJECTS
            $active_projects = Project::where('status',1)->get();

            // 2. FOR EACH OF THE PROJECT, UPDATE KPIs
            foreach ($active_projects as $key => $value) {

                // 2.2 CPI - GET ACTUAL COST OF THE PROJECT\
                $ledger_all_negative = Ledger::select('project_ledger.*')
                        ->where('project_ledger.project_id','=',$value->id)
                        ->where('project_ledger.status','=',1)
                        ->where('project_ledger.cost_type','=',2)
                        ->get();
                $actual_cost = $ledger_all_negative->sum('value');

                // 2.3 CPI - GET EARNED COST VALUE OF THE PROJECT (Actual Budget * Progress)
                $earned_value = $value->budget * ($value->progress/100);

                // 2.4 CPI - GET ACTUAL CPI OF THE PROJECT (Earned Cost Value / Actual Cost)
                $cpi = 0;       
                if ($actual_cost != 0){ 
                    $cpi = $earned_value / $actual_cost;
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
                $project_save->cpi = $cpi;
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

    
}
