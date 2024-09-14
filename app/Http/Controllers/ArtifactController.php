<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artifact;
use RealRashid\SweetAlert\Facades\Alert;

class ArtifactController extends Controller
{
    public function index()
    {
        //
    }

    public function update_batch(Request $request)
    {
        foreach ($request->input('artifacts_updated') as $key => $value) {
            Artifact::where('id','=',$key)->update(['link'=>$value]);
        }
        Alert::success('Success', 'Artifacts have been udpated!');
        // return redirect("/project"."/".$request->input('proj_id'));
        return redirect()->back();
    }
    public function initialize($ids)
    {
        $ids = 17;

        for ($id=17; $id <= 63; $id++) { 
            // Insert initial list of other artifacts
            $artifacts = [
                [
                    'project_id' => $id,
                    'artifact_type' => 1,
                    'artifact_name' => 'Project Creation (BCD/Contract)'
                ],
                [
                    'project_id' => $id,
                    'artifact_type' => 1,
                    'artifact_name' => 'Project Charter'
                ],[
                    'project_id' => $id,
                    'artifact_type' => 1,
                    'artifact_name' => 'Kickoff Deck'
                ],[
                    'project_id' => $id,
                    'artifact_type' => 1,
                    'artifact_name' => 'Project Schedule'
                ],[
                    'project_id' => $id,
                    'artifact_type' => 1,
                    'artifact_name' => 'QA Certificate'
                ],[
                    'project_id' => $id,
                    'artifact_type' => 1,
                    'artifact_name' => 'UAT Certificate'
                ],[
                    'project_id' => $id,
                    'artifact_type' => 1,
                    'artifact_name' => 'Go Live Acceptance'
                ],[
                    'project_id' => $id,
                    'artifact_type' => 1,
                    'artifact_name' => 'Closure Acceptance'
                ]
            ];

            Artifact::insert($artifacts);
        }
        
    }
}
