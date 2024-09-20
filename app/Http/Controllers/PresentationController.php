<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresentationController extends Controller
{
    public function index()
    {
        if(auth()->user()->role != 1){
            return redirect("/project"); 
        }

        return view('dashboard.present', [
        ]);
    }
}
