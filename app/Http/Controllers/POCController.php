<?php

namespace App\Http\Controllers;

use App\Models\POC;
use Illuminate\Http\Request;

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
}
