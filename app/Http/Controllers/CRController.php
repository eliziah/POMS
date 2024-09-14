<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CRBudget;
use App\Models\CRSchedule;

class CRController extends Controller
{
    //
    public function show_crs()
    {

        $crb = CRBudget::select('cr_budget.*','projects.short_name as project_name','users.name as pmname')
                        ->join('projects','projects.id','=','cr_budget.project_id')
                        ->join('users','users.id_user','=','projects.pm')
                        ->orderBy('cr_budget.created_at','desc')
                        ->orderBy('cr_budget.status','desc');

        $crs = CRSchedule::select('cr_sched.*','projects.short_name as project_name','users.name as pmname')
                        ->join('projects','projects.id','=','cr_sched.project_id')
                        ->join('users','users.id_user','=','projects.pm')
                        ->orderBy('cr_sched.created_at');

        if(auth()->user()->role == 1){
            $crb->where('projects.pm','=',auth()->user()->id_user);
            $crs->where('projects.pm','=',auth()->user()->id_user);
        }

        $cr_budget = $crb->get();
        $cr_sched = $crs->get();

        return view('crs.cr',[
            'crb' => $cr_budget,
            'crs' => $cr_sched,
        ]);
    }

}
