<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CRSchedule;
use App\Models\Project;
use App\Models\ProjectLog;
use RealRashid\SweetAlert\Facades\Alert;

class CRScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        //
    }

    public function create_project_cr($id)
    {   
        $project_details = Project::where('proj_id','=',$id)->first();
        return view('crsched.cr-add',[
            'project' => $project_details
        ]);
    }
    public function update_crs_id($id)
    {
        $crs = CRSchedule::findOrFail($id);
        $crs->crs_id = "CRS_".str_pad($id, 5, "0", STR_PAD_LEFT);
        $crs->update();
        return $crs->crb_id;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        // var_dump($request->input());
        // exit();
        $validated = $request->validate([
            'old_live' => 'required',
            'new_live' => 'required',
            'old_close' => 'required',
            'new_close' => 'required',
            'remarks' => 'required|max:255|min:50',
            'link' => 'required'
        ]);
        $crs = new CRSchedule;
        $crs->project_id = $id;
        $crs->crs_id = "CR---";
        $crs->old_live = $validated['old_live'];
        $crs->new_live = $validated['new_live'];
        $crs->old_close = $validated['old_close'];
        $crs->new_close = $validated['new_close'];
        $crs->remarks = $validated['remarks'];
        $crs->link = $validated['link'];
        $crs->save();

        // Update CRS ID
        $crs_id = $this->update_crs_id($crs->id);

        // Insert Log
        $my_user_id = auth()->user()->id_user;
        ProjectLog::insert([
            'project_id'=>$id,
            'action'=>1, //1-created  2-updated  3-approved   4-deleted
            'item'=>3, //1-project    2-budget(cr)  3-sched(cr)   4-weekly report   5-progress(wr)  6-gate(wr)  7-phase(wr) 8-rag(wr)
            'user_id'=>$my_user_id,
            'remarks' => $crs_id." -- GO LIVE date from ".date_format(date_create($validated['old_live']),'F d, Y')." to ".date_format(date_create($validated['new_live']),'F d, Y')." and CLOSURE date from ".date_format(date_create($validated['old_close']),'F d, Y')." to ".date_format(date_create($validated['new_close']),'F d, Y')
        ]);

        Alert::success('Success', $crs_id.' has been created, please wait for PMO Head Approval!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cr_details = CRSchedule::where('crs_id','=',$id)->first();
        $project_details = Project::where('id','=',$cr_details['project_id'])->first();
        return view('crsched.cr-approve',[
            'project' => $project_details,
            'cr_details' => $cr_details
        ]);
    }

    public function approve($id,$status = 1)
    {
        //change status of CR
        $crb = CRSchedule::where('crs_id',$id)->firstOrFail();
        $crb->status = 1;
        $crb->update();

        //change budget in Project Details
        $project = Project::findOrFail($crb->project_id);
        $project->p_live = $crb->new_live;
        $project->p_close = $crb->new_close;
        $project->update();

        //insert logs (approval of CR)
        $my_user_id = auth()->user()->id_user;
        ProjectLog::insert([
            'project_id'=>$crb->project_id,
            'action'=>3, //1-created  2-updated  3-approved   4-deleted
            'item'=>3, //1-project    2-budget(cr)  3-sched(cr)   4-weekly report   5-progress(wr)  6-gate(wr)  7-phase(wr) 8-rag(wr)
            'user_id'=>$my_user_id,
            'remarks' => "Approved ".$crb->crs_id." -- go live date to ".date_format(date_create($crb->new_live),'F d, Y')." and closure date to ".date_format(date_create($crb->new_close),'F d, Y')
        ]);

        //insert logs (changing of schedule in project details)
        $my_user_id = auth()->user()->id_user;
        ProjectLog::insert([
            'project_id'=>$crb->project_id,
            'action'=>2, //1-created  2-updated  3-approved   4-deleted
            'item'=>1, //1-project    2-budget(cr)  3-sched(cr)   4-weekly report   5-progress(wr)  6-gate(wr)  7-phase(wr) 8-rag(wr)
            'user_id'=>$my_user_id,
            'remarks' => "Project live date updated from ".date_format(date_create($crb->old_live),'F d, Y')." to ".date_format(date_create($crb->new_live),'F d, Y')." and closure date from ".date_format(date_create($crb->old_close),'F d, Y')." to ".date_format(date_create($crb->new_close),'F d, Y')
        ]);

        Alert::success('Success', $crb->crs_id.' has been APPROVED!');
        return redirect()->back();
            
        
        
    }
/**
     * Store a newly created resource in storage.
     */
    public function reject(Request $request, $id)
    {
        //change status of CR
        $crs = CRSchedule::where('crs_id',$id)->firstOrFail();
        $crs->status = 2;
        $crs->reason = $request->input('reason');
        $crs->update();
            
        //insert logs (rejection of CR)
        $my_user_id = auth()->user()->id_user;
        ProjectLog::insert([
            'project_id'=>$crs->project_id,
            'action'=>4, //1-created  2-updated  3-approved   4-deleted
            'item'=>2, //1-project    2-budget(cr)  3-sched(cr)   4-weekly report   5-progress(wr)  6-gate(wr)  7-phase(wr) 8-rag(wr)
            'user_id'=>$my_user_id,
            'remarks' => "Rejected ".$crs->crs_id." - Reason: ".$request->input('reason')
        ]);

        Alert::success('Success', $crs->crs_id.' has been REJECTED!');
        return redirect()->back();
        
        
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
