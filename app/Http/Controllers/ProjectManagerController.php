<?php

namespace App\Http\Controllers;

use App\Models\CRBudget;
use App\Models\ProjectLog;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class ProjectManagerController extends Controller
{
    public function index()
    {
        $pms = User::where('role','=',1)->get();
        $projs = Project::select('projects.*','users.name as pm_name')
                ->where('projects.status','=',1)
                ->join('users','users.id_user','=','projects.pm')
                ->get();

        $pm_capacity = array();
        foreach ($projs as $value) {
            array_push($pm_capacity, array(
                $value->pm_name,
                $value->short_name,
                $value->p_start,
                $value->p_close
            ));
        }
        return view('pm.pm',[
            'pms' => $pms,
            'pm_capacity' => $pm_capacity
        ]);
    }

    public function show($id)
    {
        if (auth()->user()->role == 2 || $id == auth()->user()->id_user){
            $crs = DB::select("SELECT t.*, projects.short_name as name FROM (
                        ( SELECT id, crs_id as cr_id, 'crs' as type, new_live as new, project_id, status, created_at FROM cr_sched )
                        UNION ALL
                        ( SELECT id, crb_id as cr_id, 'crb' as type, new_budget as new, project_id, status, created_at FROM cr_budget )
                    ) as t 
                    INNER JOIN projects ON t.project_id = projects.id
                    WHERE projects.pm = ".auth()->user()->id_user."
                    ORDER BY created_at DESC;");
            $logs = ProjectLog::select('project_logs.*','projects.short_name')
                    ->where('project_logs.action',2)
                    ->where('project_logs.item',7)
                    ->where('projects.pm',auth()->user()->id_user)
                    ->join('projects','projects.id','=','project_logs.project_id')
                    ->orderBy('project_logs.created_at','desc')
                    ->get();
            $projs = Project::select('projects.*','users.name as pm_name')
                    ->where('projects.status','=',1)
                    ->where('projects.pm',auth()->user()->id_user)
                    ->join('users','users.id_user','=','projects.pm')
                    ->orderBy('projects.rag','desc')
                    ->get();

            $pm_capacity = array();
            foreach ($projs as $value) {
                array_push($pm_capacity, array(
                    $value->pm_name,
                    $value->short_name,
                    $value->p_start,
                    $value->p_close
                ));
            }
            // var_dump($pm_capacity);
            // exit();
            return view('pm.pm-dashboard', [
                'crb' => $crs,
                'logs' => $logs,
                'pm_capacity' => $pm_capacity,
                'projs' => $projs
            ]);
        }else{
            Alert::error('Error', 'You do not have permission to view this dashboard!');
            return redirect()->back();
        }
        
    }
}
