<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectLog;
use App\Models\Weekly;
use RealRashid\SweetAlert\Facades\Alert;


class WeeklyController extends Controller
{
    public function index()
    {
        $weekly = Weekly::select('weekly_reports.*','projects.short_name as project_name')
                    -> join('projects','projects.id','=','weekly_reports.project_id');
        if( auth()->user()->role == 1 ){
            $weekly->where('projects.pm','=',auth()->user()->id_user);
        }

        $all_weekly = $weekly->orderBy('weekly_reports.workweek','desc')->orderBy('weekly_reports.id','desc')->get();
        return view('weekly.weekly',[
                'all_weekly' => $all_weekly
            ]);

    }
    public function show($id)
    {
        $weekly = Weekly::select('weekly_reports.*','projects.short_name as project_name','projects.pm as pm_id')
                    -> join('projects','projects.id','=','weekly_reports.project_id')
                    ->where('weekly_reports.id','=',$id)
                    ->first();
        if( auth()->user()->id_user == $weekly['pm_id'] || auth()->user()->role == 2 ){
            return view('weekly.weekly-show',[
                'weekly' => $weekly
            ]);
        } else {
            Alert::error('Error', 'You do not have permission to view this weekly report.');
            return redirect()->back();
        }
        

    }
    public function create($id)
    {   
        // get week today
        $week = date( 'W', strtotime( 'monday this week' ) );

        // check week today if existing in weekly reports table
        $is_weekly = Weekly::where('weekly_reports.workweek','=',$week)
                        ->where('projects.proj_id','=',$id)
                        ->join('projects','projects.id','=','weekly_reports.project_id')
                        ->get();

        // if week today is already existing, redirect back
        if($is_weekly->count()>0){
            Alert::info('FYI', 'You already have an existing weekly report for this week.');
            return redirect()->back();
        }else{
            // get friday last week
            $friday = date( 'Y-m-d', strtotime( 'friday last week' ) );
            $friday_text = date( 'F d', strtotime( 'friday last week' ) );

            // get thursday this week
            $thursday = date( 'Y-m-d', strtotime( 'thursday this week' ) );
            $thursday_text = date( 'F d', strtotime( 'thursday this week' ) );

            $project_details = Project::where('proj_id','=',$id)->first();
            return view('weekly.weekly-add',[
                'project' => $project_details,
                'week' => $week,
                'week_friday_start' => $friday,
                'week_thursday_end' => $thursday,
                'week_friday_start_text' => $friday_text,
                'week_thursday_end_text' => $thursday_text
            ]);
        }
    }

    public function store(Request $request,$id)
    {
        // Add weekly report
        $validated = $request->validate([
            'start' => 'required',
            'end' => 'required',
            'workweek' => 'required',
            'progress' => 'required',
            'gate' => 'required',
            'rag' => 'required',
            'phase' => 'required',
            'executive' => 'required|max:255|min:150',
            'highlights' => 'max:1000',
            'risks' => 'max:1000',
            'help' => 'max:1000',
            'nextsteps' => 'max:1000',
        ]);


        $weekly = new Weekly;
        $weekly->project_id = $id;
        $weekly->start = $validated['start'];
        $weekly->end = $validated['end'];
        $weekly->workweek = $validated['workweek'];
        $weekly->progress = $validated['progress'];
        $weekly->gate = $validated['gate'];
        $weekly->phase = $validated['phase'];
        $weekly->executive = $validated['executive'];
        $weekly->highlights = $validated['highlights'];
        $weekly->risks = $validated['risks'];
        $weekly->help = $validated['help'];
        $weekly->nextsteps = $validated['nextsteps'];
        $weekly->rag = $validated['rag'];
        $weekly->save();


        // Insert project log for creating weekly report
        $my_user_id = auth()->user()->id_user;
        ProjectLog::insert([
            'project_id'=>$id,
            'action'=>1, //1-created  2-updated  3-approved   4-deleted
            'item'=>4, //1-project    2-budget(cr)  3-sched(cr)   4-weekly report   5-progress(wr)  6-gate(wr)  7-phase(wr) 8-rag(wr)
            'user_id'=>$my_user_id,
            'remarks' => "Weekly report created for Work Week ".$validated['workweek']
        ]);

        // Store project details
        $project = Project::findOrFail($id);

        // If rag is changed
        if($request->input('old_rag') != $validated['rag']){

            // update project rag
            $project->rag = $validated['rag'];
            $old_rag_text = '';
            $new_rag_text = '';
            if($request->input('old_rag')==1){ $old_rag_text = "GREEN"; }else if($request->input('old_rag')==2){ $old_rag_text = "AMBER"; }else if($request->input('old_rag')==3){ $old_rag_text = "RED"; }
            if($validated['rag']==1){ $new_rag_text = "GREEN"; }else if($validated['rag']==2){ $new_rag_text = "AMBER"; }else if($validated['rag']==3){ $new_rag_text = "RED"; }

            // insert log for change in rag
            ProjectLog::insert([
                'project_id'=>$id,
                'action'=>2, //1-created  2-updated  3-approved   4-deleted
                'item'=>8, //1-project    2-budget(cr)  3-sched(cr)   4-weekly report   5-progress(wr)  6-gate(wr)  7-phase(wr) 8-rag(wr)
                'user_id'=>$my_user_id,
                'remarks' => "Project RAG updated from ".$old_rag_text." to ".$new_rag_text
            ]);
        }

        // If progress is changed
        if($request->input('old_progress') != $validated['progress']){

            // update project progress
            $project->progress = $validated['progress'];

            // insert log for change in progress
            ProjectLog::insert([
                'project_id'=>$id,
                'action'=>2, //1-created  2-updated  3-approved   4-deleted
                'item'=>5, //1-project    2-budget(cr)  3-sched(cr)   4-weekly report   5-progress(wr)  6-gate(wr)  7-phase(wr) 8-rag(wr)
                'user_id'=>$my_user_id,
                'remarks' => "Project progress updated from ".$request->input('old_progress')." to ".$validated['progress']
            ]);
        }

        // If gate is changed
        if($request->input('old_gate') != $validated['gate']){

            // update project gate
            $project->gate = $validated['gate'];
            $old_gate_text = '';
            $new_gate_text = '';
            if($request->input('old_gate')==1){ $old_gate_text = "G1-Initiation"; }else if($request->input('old_gate')==2){ $old_gate_text = "G2-Planning"; }else if($request->input('old_gate')==3){ $old_gate_text = "G3-Execution"; }else if($request->input('old_gate')==4){ $old_gate_text = "G4-Closing"; }else if($request->input('old_gate')==5){ $old_gate_text = "BR-Benefits Realization"; }
            if($validated['gate']==1){ $new_gate_text = "G1-Initiation"; }else if($validated['gate']==2){ $new_gate_text = "G2-Planning"; }else if($validated['gate']==3){ $new_gate_text = "G3-Execution"; }else if($validated['gate']==4){ $new_gate_text = "G4-Closing"; }else if($validated['gate']==5){ $new_gate_text = "BR-Benefits Realization"; }

            // insert log for change in gate
            ProjectLog::insert([
                'project_id'=>$id,
                'action'=>2, //1-created  2-updated  3-approved   4-deleted
                'item'=>6, //1-project    2-budget(cr)  3-sched(cr)   4-weekly report   5-progress(wr)  6-gate(wr)  7-phase(wr) 8-rag(wr)
                'user_id'=>$my_user_id,
                'remarks' => "Project gate updated from ".$old_gate_text." to ".$new_gate_text

            ]);
        }

        // If phase is changed
        if($request->input('old_phase') != $validated['phase']){

            // update project phase
            $project->phase = $validated['phase'];
            $old_phase_text = '';
            $new_phase_text = '';
            if($request->input('old_gate')==1){ $old_phase_text = "Planning"; }else if($request->input('old_gate')==2){ $old_phase_text = "Development"; }else if($request->input('old_gate')==3){ $old_phase_text = "Testing"; }else if($request->input('old_gate')==4){ $old_phase_text = "User Acceptance"; }else if($request->input('old_gate')==5){ $old_phase_text = "Live"; }
            if($validated['phase']==1){ $new_phase_text = "Planning"; }else if($validated['phase']==2){ $new_phase_text = "Development"; }else if($validated['phase']==3){ $new_phase_text = "Testing"; }else if($validated['phase']==4){ $new_phase_text = "User Acceptance"; }else if($validated['phase']==5){ $new_phase_text = "Live"; }

            // insert log for change in phase
            ProjectLog::insert([
                'project_id'=>$id,
                'action'=>2, //1-created  2-updated  3-approved   4-deleted
                'item'=>7, //1-project    2-budget(cr)  3-sched(cr)   4-weekly report   5-progress(wr)  6-gate(wr)  7-phase(wr) 8-rag(wr)
                'user_id'=>$my_user_id,
                'remarks' => "Project phase updated from ".$old_phase_text." to ".$new_phase_text

            ]);
        }
        
        // Save project details
        $project->update();
        
        Alert::success('Success', 'Weekly report for Week '.$validated['workweek'].' has been created. Project details have been updated also.');
        return redirect('/project'.'/'.$project->proj_id);
    }
}
