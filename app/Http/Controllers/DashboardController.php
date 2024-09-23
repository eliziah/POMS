<?php

namespace App\Http\Controllers;

use App\Models\CRBudget;
use App\Models\ProjectLog;
use App\Models\Project;
use App\Models\Ledger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if(auth()->user()->role == 1){
            return redirect('/pm/'.auth()->user()->id_user);
        }
        
        $project_list_ongoing = Project::where('status','=',1)->orderBy('rag','desc')->orderBy('id','desc')->get();
        $project_all = Project::where('status','<>',0)->where('status','<>',4)->get()->count();
        $project_ongoing = Project::where('status','=',1)->get()->count();
        $project_completed = Project::where('status','=',2)->get()->count();
        $project_onhold = Project::where('status','=',3)->get()->count();
        $project_green = Project::where('status','=',1)->where('rag','=',1)->get()->count();
        $project_amber = Project::where('status','=',1)->where('rag','=',2)->get()->count();
        $project_red = Project::where('status','=',1)->where('rag','=',3)->get()->count();
        $project_rag = array( $project_green,$project_amber,$project_red );
        $cpi = Project::where('status','<>',0)->where('status','<>',4)->where('cpi','<>',0)->avg('cpi');
        $spi = Project::where('status','<>',0)->where('status','<>',4)->where('spi','<>',0)->avg('spi');

        $ledger_all_positive = Ledger::select('project_ledger.*')
                ->where('projects.status','<>',0)
                ->where('projects.status','<>',4)
                ->where('projects.status','<>',3)
                ->where('project_ledger.status','=',1)
                ->where('project_ledger.cost_type','=',1)
                ->join('projects','projects.id','=','project_ledger.project_id')
                ->get();
        $budget = $ledger_all_positive->sum('value');

        $ledger_all_negative = Ledger::select('project_ledger.*')
                ->where('projects.status','<>',0)
                ->where('projects.status','<>',4)
                ->where('projects.status','<>',3)
                ->where('project_ledger.status','=',1)
                ->where('project_ledger.cost_type','=',2)
                ->join('projects','projects.id','=','project_ledger.project_id')
                ->get();
        $cost = $ledger_all_negative->sum('value');
        if($budget != 0){
            $consumed = ($cost / $budget) * 100;
        }else{
            $consumed = 0;
        }
        

        $crs = DB::select("SELECT t.*, projects.short_name as name FROM (
                    ( SELECT id, crs_id as cr_id, 'crs' as type, new_live as new, project_id, status, created_at FROM cr_sched )
                    UNION ALL
                    ( SELECT id, crb_id as cr_id, 'crb' as type, new_budget as new, project_id, status, created_at FROM cr_budget )
                ) as t 
                INNER JOIN projects ON t.project_id = projects.id
                ORDER BY created_at DESC
                LIMIT 6;");
        $logs = ProjectLog::select('project_logs.*','projects.short_name')
                ->where('project_logs.action',2)
                ->where('project_logs.item',7)
                ->join('projects','projects.id','=','project_logs.project_id')
                ->orderBy('project_logs.created_at','desc')
                ->get();
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
        // var_dump($pm_capacity);
        // exit();
        return view('dashboard.dashboard', [
            'crb' => $crs,
            'logs' => $logs,
            'pm_capacity' => $pm_capacity,
            'p_a' => $project_all,
            'p_o' => $project_ongoing,
            'p_c' => $project_completed,
            'p_h' => $project_onhold,
            'cpi' => $cpi,
            'spi' => $spi,
            'budget' => $budget,
            'cost' => $cost,
            'consumed' => $consumed,
            'projects' => $project_list_ongoing,
            'rag_count' => $project_rag
        ]);
    }

    public function pm(Request $request)
    {
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
        return view('dashboard.pm', [
            'crb' => $crs,
            'logs' => $logs,
            'pm_capacity' => $pm_capacity,
            'projs' => $projs
        ]);
    }

    public function guest()
    {

        $projects = Project::select('projects.*','users.name as pmname')
                            ->where('projects.status',1)
                            ->join('users','users.id_user','=','projects.pm')
                            ->orderBy('projects.rag','desc')
                            ->get();

        // var_dump($projects);
        // exit();
        $crs = DB::select("SELECT t.*, projects.short_name as name FROM (
                    ( SELECT id, crs_id as cr_id, 'crs' as type, new_live as new, project_id, status, created_at FROM cr_sched )
                    UNION ALL
                    ( SELECT id, crb_id as cr_id, 'crb' as type, new_budget as new, project_id, status, created_at FROM cr_budget )
                ) as t 
                INNER JOIN projects ON t.project_id = projects.id
                ORDER BY created_at DESC;");
        $depts = DB::select("SELECT sponsor_dept, COUNT(*) as dept_count FROM projects GROUP BY sponsor_dept ORDER BY dept_count DESC LIMIT 10;");
        $logs = ProjectLog::select('project_logs.*','projects.short_name')
                ->where('project_logs.action',2)
                ->where('project_logs.item',7)
                ->join('projects','projects.id','=','project_logs.project_id')
                ->orderBy('project_logs.created_at','desc')
                ->get();

        $depts_name = array();
        $depts_count = array();
        foreach ($depts as $key => $value) {
            array_push($depts_name, $value->sponsor_dept);
            array_push($depts_count, $value->dept_count);
        }
        return view('dashboard.guest-dashboard', [
            'crb' => $crs,
            'logs' => $logs,
            'depts_name' => $depts_name,
            'depts_count' => $depts_count,
            'projects' => $projects
        ]);
    }

    public function guest_specific($type="internal")
    {

        if($type!="external" && $type!="internal"){
            return redirect()->back();    
        }

        $project_list_ongoing = Project::where('area_type','=',$type)->orderBy('rag','desc')->orderBy('id','desc')->get();
        $project_all = Project::where('status','<>',0)->where('area_type','=',$type)->where('status','<>',4)->get()->count();
        $project_ongoing = Project::where('status','=',1)->where('area_type','=',$type)->get()->count();
        $project_completed = Project::where('status','=',2)->where('area_type','=',$type)->get()->count();
        $project_onhold = Project::where('status','=',3)->where('area_type','=',$type)->get()->count();
        $project_green = Project::where('status','=',1)->where('area_type','=',$type)->where('rag','=',1)->get()->count();
        $project_amber = Project::where('status','=',1)->where('area_type','=',$type)->where('rag','=',2)->get()->count();
        $project_red = Project::where('status','=',1)->where('area_type','=',$type)->where('rag','=',3)->get()->count();
        $project_rag = array( $project_green,$project_amber,$project_red );
        $cpi = Project::where('status','<>',0)->where('area_type','=',$type)->where('status','<>',4)->where('cpi','<>',0)->avg('cpi');
        $spi = Project::where('status','<>',0)->where('area_type','=',$type)->where('status','<>',4)->where('spi','<>',0)->avg('spi');

        $ledger_all_positive = Ledger::select('project_ledger.*')
            ->where('projects.status','<>',0)
            ->where('projects.status','<>',4)
            ->where('projects.status','<>',3)
            ->where('projects.area_type','=',$type)
            ->where('project_ledger.status','=',1)
            ->where('project_ledger.cost_type','=',1)
            ->join('projects','projects.id','=','project_ledger.project_id')
            ->get();

        $budget = $ledger_all_positive->sum('value');

        $ledger_all_negative = Ledger::select('project_ledger.*')
            ->where('projects.status','<>',0)
            ->where('projects.status','<>',4)
            ->where('projects.status','<>',3)
            ->where('projects.area_type','=',$type)
            ->where('project_ledger.status','=',1)
            ->where('project_ledger.cost_type','=',2)
            ->join('projects','projects.id','=','project_ledger.project_id')
            ->get();
        $cost = $ledger_all_negative->sum('value');

        if($type=="internal"){
            $depts = DB::select("SELECT sponsor_dept, COUNT(*) as dept_count FROM projects WHERE projects.area_type = '".$type."' GROUP BY sponsor_dept ORDER BY dept_count DESC LIMIT 10;");
        }else if($type=="external"){
            $depts = DB::select("SELECT sponsor_name as `sponsor_dept`, COUNT(*) as dept_count FROM projects WHERE projects.area_type = '".$type."' GROUP BY sponsor_name ORDER BY dept_count DESC LIMIT 10;");
        }
        $depts_name = array();
        $depts_count = array();
        foreach ($depts as $key => $value) {
            array_push($depts_name, $value->sponsor_dept);
            array_push($depts_count, $value->dept_count);
        }

        return view('dashboard.guest-specific-dashboard', [
            'depts_name' => $depts_name,
            'depts_count' => $depts_count,
            'p_a' => $project_all,
            'p_o' => $project_ongoing,
            'p_c' => $project_completed,
            'p_h' => $project_onhold,
            'cpi' => $cpi,
            'spi' => $spi,
            'area_type' => $type,
            'budget' => $budget,
            'cost' => $cost,
            'projects' => $project_list_ongoing,
            'rag_count' => $project_rag
        ]);
    }
}
