<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Sponsor;
use App\Models\Client;
use App\Models\Project;
use App\Models\Ledger;
use App\Models\Artifact;
use App\Models\ProjectLog;
use App\Models\CRBudget;
use App\Models\CRSchedule;
use App\Models\CostComponent;
use App\Models\Platform;
use App\Models\Weekly;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectController extends Controller
{
    public function index()
    {
        $stat = "all";
        if(request()->exists('status')){
            $stat = request()->status;
        }

        $x_projects = Project::select('projects.*','users.name as pmname')
                            ->where('projects.area_type','=','External')
                            ->where('projects.status','<>',0)
                            ->where('projects.status','<>',4)
                            ->where('projects.status','<>',5)
                            ->join('users','users.id_user','=','projects.pm')
                            ->orderBy('projects.id','desc');

        $n_projects = Project::select('projects.*','users.name as pmname')
                            ->where('projects.area_type','=','Internal')
                            ->where('projects.status','<>',0)
                            ->where('projects.status','<>',4)
                            ->where('projects.status','<>',5)
                            ->join('users','users.id_user','=','projects.pm')
                            ->orderBy('projects.id','desc');
        
        if($stat != "all"){
            $x_projects->where('projects.status','=',$stat);
            $n_projects->where('projects.status','=',$stat);
        }

        if(auth()->user()->role == 1){
            $x_projects->where('projects.pm','=',auth()->user()->id_user);
            $n_projects->where('projects.pm','=',auth()->user()->id_user);
        }

        $ex_projects = $x_projects->get();
        $in_projects = $n_projects->get();

        return view('project.project', [
            'internal_projects' => $in_projects,
            'external_projects' => $ex_projects
        ]);
    }

    public function guest_all()
    {
        $ex_projects = Project::select('projects.*','users.name as pmname')
                            ->where('projects.area_type','=','External')
                            ->where('projects.status','<>',0)
                            ->join('users','users.id_user','=','projects.pm')
                            ->orderBy('projects.proj_id','desc')
                            ->get();
        $in_projects = Project::select('projects.*','users.name as pmname')
                            ->where('projects.area_type','=','Internal')
                            ->where('projects.status','<>',0)
                            ->join('users','users.id_user','=','projects.pm')
                            ->orderBy('projects.proj_id','desc')
                            ->get();
        return view('project.guest-project', [
            'internal_projects' => $in_projects,
            'external_projects' => $ex_projects
        ]);
    }

    public function add_negative_ledger(Request $request, $id)
    {

        $validated = $request->validate([
            'cost_component' => 'required',
            'description' => 'required|max:255|min:5',
            'value' => 'required',
            'link' => 'max:255'
        ]);

        Ledger::insert([
            'project_id' => $id,
            'cost_component' => $validated['cost_component'],
            'description' => $validated['description'],
            'value' => $validated['value'],
            'link' => $validated['link'],
            'cost_type' => 2
        ]);
        Alert::success('Success', 'A negative entry amounting to Php '.number_format($request->input('value'),2,'.',',').' has been entered!');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_in() // create internal project
    {
        $project_managers = User::where('active',1)->orderBy('name', 'asc')->where('role',1)->get();
        $departments = Department::where('status',1)->orderBy('name', 'asc')->get();
        $sponsor = Sponsor::where('status',1)->orderBy('name', 'asc')->get();
        $platforms = Platform::where('status',1)->orderBy('name', 'asc')->get();
        return view('project.project-add-in',[
            'departments' => $departments,
            'pms' => $project_managers,
            'sponsor' => $sponsor,
            'platforms' => $platforms
        ]);
    }
    public function create_ex() // create external project
    {
        $project_managers = User::where('active',1)->orderBy('name', 'asc')->where('role',1)->get();
        $departments = Department::where('status',1)->orderBy('name', 'asc')->get();
        $clients = Client::where('status',1)->orderBy('name', 'asc')->get();
        $platforms = Platform::where('status',1)->orderBy('name', 'asc')->get();
        return view('project.project-add-ex',[
            'departments' => $departments,
            'pms' => $project_managers,
            'clients' => $clients,
            'platforms' => $platforms
        ]);
    }

    // Generate project id
    public function update_proj_id($type,$id_proj)
    {
        $project = Project::findOrFail($id_proj);
        if($type=="Internal"){
            $project->proj_id = "PRJ_IN_".date("Y").str_pad($id_proj, 3, "0", STR_PAD_LEFT);
        }else{
            $project->proj_id = "PRJ_EX_".date("Y").str_pad($id_proj, 3, "0", STR_PAD_LEFT);
        }
        $project->update();
        return $project->proj_id;
    }

    // Initialize project artifacts
    public function initialize_project_artifacts($id_proj,$artifact)
    {
        // Insert project creation document (BCD or Contract)
        Artifact::insert([
            [
                'project_id' => $id_proj,
                'artifact_type' => 1,
                'artifact_name' => 'Project Creation (BCD/Contract)',
                'link' => $artifact
            ]
        ]);

        // Insert initial list of other artifacts
        $artifacts = [
            [
                'project_id' => $id_proj,
                'artifact_type' => 1,
                'artifact_name' => 'Project Charter'
            ],[
                'project_id' => $id_proj,
                'artifact_type' => 1,
                'artifact_name' => 'Kickoff Deck'
            ],[
                'project_id' => $id_proj,
                'artifact_type' => 1,
                'artifact_name' => 'Project Schedule'
            ],[
                'project_id' => $id_proj,
                'artifact_type' => 1,
                'artifact_name' => 'QA Certificate'
            ],[
                'project_id' => $id_proj,
                'artifact_type' => 1,
                'artifact_name' => 'UAT Certificate'
            ],[
                'project_id' => $id_proj,
                'artifact_type' => 1,
                'artifact_name' => 'Go Live Acceptance'
            ],[
                'project_id' => $id_proj,
                'artifact_type' => 1,
                'artifact_name' => 'Closure Acceptance'
            ]
        ];

        return Artifact::insert($artifacts);
    }

    // Store new project
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'short_name' => 'required|max:37',
            'description' => 'required|max:170|min:115',
            'area_type' => 'required',
            'initiative_type' => 'required',
            'sponsor_name' => 'required',
            'sponsor_dept' => 'required',
            'sponsor_sub' => 'required',
            'pm' => 'required',
            'p_start' => 'required',
            'p_live' => 'required',
            'p_close' => 'required',
            'budget' => 'required'
        ]);
        
        $project = new Project;
        $project->proj_id = "PRJ----";
        $project->name = $request->input('name');
        $project->platform = $request->input('platform');
        $project->short_name = $request->input('short_name');
        $project->description = $request->input('description');
        $project->area_type = $request->input('area_type');
        $project->initiative_type = $request->input('initiative_type');
        $project->sponsor_name = $request->input('sponsor_name');
        $project->sponsor_dept = $request->input('sponsor_dept');
        $project->sponsor_sub = $request->input('sponsor_sub');
        $project->pm = $request->input('pm');
        $project->p_start = $request->input('p_start');
        $project->p_live = $request->input('p_live');
        $project->p_close = $request->input('p_close');
        $project->budget = $request->input('budget');
        $project->artifact = $request->input('artifact');
        $project->repository = $request->input('repository');
        $is_saved = $project->save();

        // Generate project id then save
        $update_proj_id = $this->update_proj_id($project->area_type,$project->id);

        // Initialize project artifiacts
        $this->initialize_project_artifacts($project->id,$request->input('artifact'));

        // Insert initial budget in legder
        Ledger::insert([
            'project_id'=> $project->id,
            'cost_type'=>1,
            'cost_component'=>1,
            'description'=>'Initial Approved Budget',
            'value'=>$request->input('budget')
        ]);

        //Insert Log
        $my_user_id = auth()->user()->id_user;
        ProjectLog::insert([
            'project_id'=>$project->id,
            'action'=>1,
            'item'=>1,
            'user_id'=>$my_user_id
        ]);

        Alert::success('Success', $update_proj_id.' has been saved!');
        return redirect("/project");
    }

    //Get ACTUAL COST by getting the sum of all NEGATIVE entries
    public function get_actual_cost($proj_id){
        $ledger_all_negative = Ledger::select('project_ledger.*')
                        ->where('projects.proj_id','=',$proj_id)
                        ->where('project_ledger.status','=',1)
                        ->where('project_ledger.cost_type','=',2)
                        ->join('projects','projects.id','=','project_ledger.project_id')
                        ->get();
        return $ledger_all_negative->sum('value');
    }

    public function get_trend($id)      
    {
        $weekly = Weekly::select('weekly_reports.end','weekly_reports.progress')
                    ->where('projects.proj_id','=',$id)
                    ->join('projects','projects.id','=','weekly_reports.project_id')
                    ->orderBy('weekly_reports.end','desc')
                    ->limit(10)
                    ->get();

        $ends = array();
        $progress = array();

        foreach ($weekly as $value) {
            array_push($ends, date_format(date_create($value->end),'M d'));
            array_push($progress, $value->progress);
        }

        $rev_ends = array_reverse($ends);
        $rev_progress = array_reverse($progress);

        $return_val = array('ends'=>$rev_ends,'progress'=>$rev_progress);
        
        return $return_val;
    }

    public function guest_show_project($id)
    {

        $project_details = Project::select('projects.*','users.name as pmname')
                            ->where('projects.proj_id','=',$id)
                            ->join('users','users.id_user','=','projects.pm')
                            ->first();

        $artifacts = Artifact::select('project_artifacts.*')
                        ->where('projects.proj_id','=',$id)
                        ->join('projects','projects.id','=','project_artifacts.project_id')
                        ->get();

        $crs = DB::select("SELECT t.*, projects.short_name as name FROM (
                            ( SELECT id, crs_id as cr_id, 'crs' as type, new_live as new, project_id, status, created_at FROM cr_sched )
                            UNION ALL
                            ( SELECT id, crb_id as cr_id, 'crb' as type, new_budget as new, project_id, status, created_at FROM cr_budget )
                        ) as t 
                        INNER JOIN projects ON t.project_id = projects.id
                        WHERE projects.proj_id = '".$id."'
                        ORDER BY created_at DESC;");

        $actual_cost = $this->get_actual_cost($id);

        $weekly_3_reversed = Weekly::select('weekly_reports.*')
                ->where('projects.proj_id','=',$id)
                ->join('projects','projects.id','=','weekly_reports.project_id')    
                ->orderBy('weekly_reports.workweek','desc')
                ->get();

        $trend = $this->get_trend($id);
                        
        // 2ND STEP - PROJECT ARTIFACTS
        $logs = ProjectLog::select('project_logs.*','users.name')
                        ->where('projects.proj_id','=',$id)
                        ->where('project_logs.action','=',2)
                        ->join('projects','projects.id','=','project_logs.project_id')
                        ->join('users','users.id_user','=','project_logs.user_id')
                        ->orderBy('id','desc')
                        ->get();
        // var_dump($trend['ends']);
        // exit();
        return view('project.guest-project-view', [
            'crs' => $crs,
            'trend_ends' => $trend['ends'],
            'trend_progress' => $trend['progress'],
            'weekly_3_reversed' => $weekly_3_reversed,
            'artifacts' => $artifacts,
            'project' => $project_details,
            'logs' => $logs,
            'actual_cost' => $actual_cost
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {   
        // GET PROJECT DETAILS
        $project_details = Project::select('projects.*','users.name as pmname')
                            ->where('projects.proj_id','=',$id)
                            ->join('users','users.id_user','=','projects.pm')
                            ->first();
        // 1ST STEP - PROJECT LEDGER
        $ledger = Ledger::select('project_ledger.*','cc.name as costname')
                    ->where('projects.proj_id','=',$id)
                    ->where('project_ledger.status','=',1)
                    ->join('cost_components as cc','cc.id','=','project_ledger.cost_component')
                    ->join('projects','projects.id','=','project_ledger.project_id')
                    ->get();
        //   Get sum of all POSITIVE entries
        $ledger_all_positive = Ledger::select('project_ledger.*')
                        ->where('projects.proj_id','=',$id)
                        ->where('project_ledger.status','=',1)
                        ->where('project_ledger.cost_type','=',1)
                        ->join('projects','projects.id','=','project_ledger.project_id')
                        ->get();
        $ledger_sum_positive = $ledger_all_positive->sum('value');
        //   Get ACTUAL COST
        $actual_cost = $this->get_actual_cost($id);


        // 2ND STEP - PROJECT ARTIFACTS
        $artifacts = Artifact::select('project_artifacts.*')
                        ->where('projects.proj_id','=',$id)
                        ->join('projects','projects.id','=','project_artifacts.project_id')
                        ->get();
                        
        // 2ND STEP - PROJECT ARTIFACTS
        $logs = ProjectLog::select('project_logs.*','users.name')
                        ->where('projects.proj_id','=',$id)
                        ->join('projects','projects.id','=','project_logs.project_id')
                        ->join('users','users.id_user','=','project_logs.user_id')
                        ->orderBy('id','desc')
                        ->get();
        
        // 3RD STEP - GET CHANGE REQUESTS
        $cr_budget = CRBudget::select('cr_budget.*','projects.short_name as project_name','users.name as pmname')
                        ->where('projects.proj_id','=',$id)
                        ->join('projects','projects.id','=','cr_budget.project_id')
                        ->join('users','users.id_user','=','projects.pm')
                        ->orderBy('cr_budget.created_at','desc')
                        ->orderBy('cr_budget.status','desc')
                        ->get();

        $cr_sched = CRSchedule::select('cr_sched.*','projects.short_name as project_name','users.name as pmname')
                        ->where('projects.proj_id','=',$id)
                        ->join('projects','projects.id','=','cr_sched.project_id')
                        ->join('users','users.id_user','=','projects.pm')
                        ->orderBy('cr_sched.created_at')
                        ->get();
        
        // 4TH STEP - GET WEEKLY REPORTS
        $weekly = Weekly::select('weekly_reports.*')
                ->where('projects.proj_id','=',$id)
                ->join('projects','projects.id','=','weekly_reports.project_id')    
                ->orderBy('weekly_reports.workweek','asc')
                ->get();

        
        // 5TH STEP - GET PROGRESS TREND
        $trend = $this->get_trend($id);
        // var_dump($id);
        // exit();


        // 6TH STEP - GET 3 WEEKLY REPORTS SORTED
        $weekly_3_reversed = Weekly::select('weekly_reports.*')
                ->where('projects.proj_id','=',$id)
                ->join('projects','projects.id','=','weekly_reports.project_id')    
                ->orderBy('weekly_reports.workweek','desc')
                ->limit(3)  
                ->get();

        // 7TH STEP - GET ALL COST COMPONENTS
        $cost_components = CostComponent::where('status',1)->get();

        // 8TH STEP - CALCULATE ALL KPIs
        if ($actual_cost == 0){
            $earned_value = $project_details['budget'] * ($project_details['progress']/100);
            $cpi = 0;
        }else{
            $earned_value = $project_details['budget'] * ($project_details['progress']/100);
            $cpi = $earned_value / $actual_cost;
        }

        $now = time();
        $p_start = strtotime($project_details['p_start']);
        $p_live = strtotime($project_details['p_live']);
        $datediff_now = $now - $p_start; // difference versus now and planned start (actual current duration)
        $datediff_p = $p_live - $p_start; // difference versus planned live and planned start (actual planned duration)

        $spi_now = round($datediff_now / (60 * 60 * 24)); // converting the time to days
        $spi_p = round($datediff_p / (60 * 60 * 24)); // converting the time to days
        $spi_progress = $spi_p * ($project_details['progress']/100); // narrative: based on the progress, what is the expected mandays that i have consumed?
        $spi = $spi_progress / $spi_now; //getting the quotient of the expected mandays over the actual current duration
        
        return view('project.project-view', [
            'ledger' => $ledger,
            'logs' => $logs,
            'crs' => $cr_sched,
            'crb' => $cr_budget,
            'cost_components' => $cost_components,
            'trend_ends' => $trend['ends'],
            'trend_progress' => $trend['progress'],
            'weekly_count' => $weekly->count(),
            'weekly' => $weekly,
            'weekly_3_reversed' => $weekly_3_reversed,
            'sum_positive' => $ledger_sum_positive,
            'actual_cost' => $actual_cost,
            'earned_value' => $earned_value,
            'cpi' => $cpi,
            'spi' => $spi,
            'artifacts' => $artifacts,
            'project' => $project_details
        ]);
    }

}
