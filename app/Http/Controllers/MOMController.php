<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\MOM;

class MOMController extends Controller
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

        // get my active project list
            if(auth()->user()->role == 1){
                $my_projects = Project::select('short_name','id')->where('pm',auth()->user()->id_user)->where('status',1)->get()->toArray();
                session(['my_active_projects' => $my_projects]);
            }else if(auth()->user()->role == 2){
                $my_projects = Project::where('status',1)->get();
                session(['my_active_projects' => $my_projects]);
            }
        return view('mom.mom',[
            'my_projects' => $my_projects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mom = new MOM;
        $mom->project_id = $request->input('project_id');
        $mom->date = $request->input('date');
        $mom->title = $request->input('title');
        $mom->agenda = $request->input('agenda');
        $mom->attendees = json_encode($request->input('attendee'));
        $mom->action = json_encode($request->input('action'));
        $mom->decision = json_encode($request->input('decision'));
        $mom->save();

        Alert::success('Success', 'Your MOM has been saved!');
        return redirect("/mom"."/".$mom->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mom = Mom::select('mom.*','projects.name')->where('mom.id',$id)->join('projects','projects.id','=','mom.project_id')->first();
        // var_dump($mom);
        // exit();
        return view('mom.mom-view',[
            'mom' => $mom
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
