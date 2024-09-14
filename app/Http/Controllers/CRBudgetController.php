<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CRBudget;
use App\Models\Project;
use App\Models\ProjectLog;
use App\Models\Ledger;
use RealRashid\SweetAlert\Facades\Alert;

class CRBudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        
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
        return view('crbudget.cr-add',[
            'project' => $project_details
        ]);
    }

    public function update_crb_id($id)
    {
        $crb = CRBudget::findOrFail($id);
        $crb->crb_id = "CRB_".str_pad($id, 5, "0", STR_PAD_LEFT);
        $crb->update();
        return $crb->crb_id;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        // var_dump($request->input());
        // exit();
        $validated = $request->validate([
            'new_budget' => 'required',
            'old_budget' => 'required',
            'delta' => 'required',
            'remarks' => 'required|max:255|min:50',
            'link' => 'required'
        ]);
        $crb = new CRBudget;
        $crb->project_id = $id;
        $crb->crb_id = "CR---";
        $crb->new_budget = $validated['new_budget'];
        $crb->old_budget = $validated['old_budget'];
        $crb->delta = $validated['delta'];
        $crb->remarks = $validated['remarks'];
        $crb->link = $validated['link'];
        $crb->save();

        // Update CRB ID
        $crb_id = $this->update_crb_id($crb->id);

        // Insert Log
        $my_user_id = auth()->user()->id_user;
        ProjectLog::insert([
            'project_id'=>$id,
            'action'=>1,
            'item'=>2,
            'user_id'=>$my_user_id,
            'remarks' => $crb_id." -- From Php ".number_format($validated['old_budget'],2,'.',',')." to Php ".number_format($validated['new_budget'],2,'.',',')." with Delta of Php ".number_format($validated['delta'],2,'.',',')
        ]);

        Alert::success('Success', $crb_id.' has been created, please wait for PMO Head Approval!');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function approve($id,$status = 1)
    {
        //change status of CR
        $crb = CRBudget::where('crb_id',$id)->firstOrFail();
        $crb->status = $status;
        $crb->update();

        //change budget in Project Details
        $project = Project::findOrFail($crb->project_id);
        $project->budget = $crb->new_budget;
        $project->update();

        //insert positive entry (Delta) in ledger
        Ledger::insert([
            'project_id'=> $project->id,
            'cost_type'=>1,
            'cost_component'=>1,
            'description'=>'Budget Change Request ('.$crb->crb_id.')',
            'link' => $crb->link,
            'value'=>$crb->delta
        ]);

        //insert logs (approval of CR)
        $my_user_id = auth()->user()->id_user;
        ProjectLog::insert([
            'project_id'=>$crb->project_id,
            'action'=>3, //1-created  2-updated  3-approved   4-deleted
            'item'=>2, //1-project    2-budget(cr)  3-sched(cr)   4-weekly report   5-progress(wr)  6-gate(wr)  7-phase(wr) 8-rag(wr)
            'user_id'=>$my_user_id,
            'remarks' => "Approved ".$crb->crb_id." -- From Php ".number_format($crb->old_budget,2,'.',',')." to Php ".number_format($crb->new_budget,2,'.',',')." with Delta of Php ".number_format($crb->delta,2,'.',',')
        ]);

        //insert logs (changing of budget in project details)
        $my_user_id = auth()->user()->id_user;
        ProjectLog::insert([
            'project_id'=>$crb->project_id,
            'action'=>2, //1-created  2-updated  3-approved   4-deleted
            'item'=>1, //1-project    2-budget(cr)  3-sched(cr)   4-weekly report   5-progress(wr)  6-gate(wr)  7-phase(wr) 8-rag(wr)
            'user_id'=>$my_user_id,
            'remarks' => "Project budget updated from Php ".number_format($crb->old_budget,2,'.',',')." to Php ".number_format($crb->new_budget,2,'.',',')." with Delta of Php ".number_format($crb->delta,2,'.',',')
        ]);

        Alert::success('Success', $crb->crb_id.' has been APPROVED!');
        return redirect()->back();

        
    }
/**
     * Store a newly created resource in storage.
     */
    public function reject(Request $request, $id)
    {
        //change status of CR
        $crb = CRBudget::where('crb_id',$id)->firstOrFail();
        $crb->status = 2;
        $crb->reason = $request->input('reason');
        $crb->update();
            
        //insert logs (rejection of CR)
        $my_user_id = auth()->user()->id_user;
        ProjectLog::insert([
            'project_id'=>$crb->project_id,
            'action'=>4, //1-created  2-updated  3-approved   4-deleted
            'item'=>2, //1-project    2-budget(cr)  3-sched(cr)   4-weekly report   5-progress(wr)  6-gate(wr)  7-phase(wr) 8-rag(wr)
            'user_id'=>$my_user_id,
            'remarks' => "Rejected ".$crb->crb_id." - Reason: ".$request->input('reason')
        ]);

        Alert::success('Success', $crb->crb_id.' has been REJECTED!');
        return redirect()->back();
        
        
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cr_details = CRBudget::where('crb_id','=',$id)->first();
        $project_details = Project::where('id','=',$cr_details['project_id'])->first();
        return view('crbudget.cr-approve',[
            'project' => $project_details,
            'cr_details' => $cr_details
        ]);
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
