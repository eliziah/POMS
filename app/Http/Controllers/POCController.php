<?php

namespace App\Http\Controllers;

use App\Models\POC;
use App\Models\User;
use App\Models\Department;
use App\Models\Platform;
use App\Models\POCWeekly;
use App\Models\POCCriteria;
use App\Models\Product;
use App\Models\POCArtifact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class POCController extends Controller
{
    public function index()
    {
        $stat = "all";
        if(request()->exists('status')){
            $stat = request()->status;
        }

        $poc_projects = POC::select('pocs.*','users.name as pmname')
                            ->where('pocs.status','<>',0)
                            ->join('users','users.id_user','=','pocs.pm')
                            ->orderBy('pocs.id','desc');

        if($stat != "all"){
            $poc_projects->where('pocs.status','=',$stat);
        }

        if(auth()->user()->role == 1){
            $poc_projects->where('pocs.pm','=',auth()->user()->id_user);
        }

        $poc_project_list = $poc_projects->get();

        return view('poc.poc', [
            'pocs' => $poc_project_list
        ]);
    }
    

    public function get_trend($id)      
    {
        $weekly = POCWeekly::select('poc_weekly_reports.end','poc_weekly_reports.progress')
                    ->where('pocs.poc_id','=',$id)
                    ->join('pocs','pocs.id','=','poc_weekly_reports.poc_id')
                    ->orderBy('poc_weekly_reports.end','desc')
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
    /**
     * Display the specified resource.
     */
    public function show($id)
    {   
        // GET PROJECT DETAILS
        $project_details = POC::select('pocs.*','users.name as pmname')
                            ->where('pocs.poc_id','=',$id)
                            ->join('users','users.id_user','=','pocs.pm')
                            ->first();

        $criteria = POCCriteria::select()->where('poc_id','=',$project_details['id'])->get();
        
        // 2ND STEP - PROJECT ARTIFACTS
        $artifacts = POCArtifact::select('poc_artifacts.*')
                        ->where('pocs.poc_id','=',$id)
                        ->join('pocs','pocs.id','=','poc_artifacts.poc_id')
                        ->get();
        
        // 4TH STEP - GET WEEKLY REPORTS
        $weekly = POCWeekly::select('poc_weekly_reports.*')
                ->where('pocs.poc_id','=',$id)
                ->join('pocs','pocs.id','=','poc_weekly_reports.poc_id')    
                ->orderBy('poc_weekly_reports.workweek','asc')
                ->limit(5)  
                ->get();

        
        // 5TH STEP - GET PROGRESS TREND
        $trend = $this->get_trend($id);
        // var_dump($id);
        // exit();


        // 6TH STEP - GET 3 WEEKLY REPORTS SORTED
        $weekly_3_reversed = POCWeekly::select('poc_weekly_reports.*')
                ->where('pocs.poc_id','=',$id)
                ->join('pocs','pocs.id','=','poc_weekly_reports.poc_id')    
                ->orderBy('poc_weekly_reports.workweek','desc')
                ->limit(3)  
                ->get();

        return view('poc.poc-view', [
            'trend_ends' => $trend['ends'],
            'trend_progress' => $trend['progress'],
            'weekly_count' => $weekly->count(),
            'weekly' => $weekly,
            'weekly_3_reversed' => $weekly_3_reversed,
            'artifacts' => $artifacts,
            'project' => $project_details,
            'criteria' => $criteria
        ]);
    }
    
    public function save_acceptance_criteria($criteria,$id){
        foreach ($criteria as $cri){
            if(!empty($cri)){
                $criteria_new = new POCCriteria;
                $criteria_new->poc_id = $id;
                $criteria_new->details = $cri;
                $criteria_new->save();
            }
        }
    }
    
    // Generate project id
    public function update_poc_id($id)
    {
        $project = POC::findOrFail($id);
        $project->poc_id = "POC_".date("Y").str_pad($id, 3, "0", STR_PAD_LEFT);
        $project->update();
        return $project->poc_id;
    }

    // Initialize project artifacts
    public function initialize_poc_artifacts($id_proj)
    {

        // Insert initial list of other artifacts
        $artifacts = [
            [
                'poc_id' => $id_proj,
                'artifact_type' => 1,
                'artifact_name' => 'POC Authorization'
            ],[
                'poc_id' => $id_proj,
                'artifact_type' => 1,
                'artifact_name' => 'QA Test Scripts'
            ],[
                'poc_id' => $id_proj,
                'artifact_type' => 1,
                'artifact_name' => 'QA Test Results'
            ],[
                'poc_id' => $id_proj,
                'artifact_type' => 1,
                'artifact_name' => 'UAT Scripts'
            ],[
                'poc_id' => $id_proj,
                'artifact_type' => 1,
                'artifact_name' => 'UAT Results'
            ],[
                'poc_id' => $id_proj,
                'artifact_type' => 1,
                'artifact_name' => 'Acceptance Document'
            ]
        ];

        return POCArtifact::insert($artifacts);
    }
    public function create() // create internal project
    {
        $project_managers = User::where('active',1)->orderBy('name', 'asc')->where('role',1)->get();
        $departments = Department::where('status',1)->orderBy('name', 'asc')->get();
        $platforms = Platform::where('status',1)->orderBy('name', 'asc')->get();
        $products = Product::where('status',1)->orderBy('name', 'asc')->get();
        return view('poc.poc-add',[
            'departments' => $departments,
            'pms' => $project_managers,
            'platforms' => $platforms,
            'products' => $products
        ]);
    }

    
    // Store new project
    public function store(Request $request)
    {
        // var_dump($request->input('criteria'));exit;
        $validated = $request->validate([
            'name' => 'required|max:255',
            'short_name' => 'required|max:50',
            'description' => 'required|max:255',
            'department' => 'required',
            'pm' => 'required',
            'p_start' => 'required',
            'p_live' => 'required',
            'p_evaluation' => 'required',
            'product' => 'required',
            'platform' => 'required',
            'budget' => 'required'
        ]);
        
        // Save POC details
        $poc_new = new POC;
        $poc_new->poc_id = "POC----";
        $poc_new->name = $request->input('name');
        $poc_new->platform = $request->input('platform');
        $poc_new->product = $request->input('product');
        $poc_new->short_name = $request->input('short_name');
        $poc_new->description = $request->input('description');
        $poc_new->department = $request->input('department');
        $poc_new->pm = $request->input('pm');
        $poc_new->p_start = $request->input('p_start');
        $poc_new->p_live = $request->input('p_live');
        $poc_new->p_evaluation = $request->input('p_evaluation');
        $poc_new->budget = $request->input('budget');
        $poc_new->repository = $request->input('repository');
        $is_saved = $poc_new->save();
        
        // Generate project id then save
        $update_poc_id = $this->update_poc_id($poc_new->id);

        // Save all related acceptance criteria
        $this->save_acceptance_criteria($request->input('criteria'),$poc_new->id);

        // Initialize project artifiacts
        $this->initialize_poc_artifacts($poc_new->id);

        Alert::success('Success', $update_poc_id.' has been saved!');
        return redirect("/poc"."/".$update_poc_id);
    }

}
