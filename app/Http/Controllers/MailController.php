<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\Mailer;
use App\Models\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        // get all users 1
        $pms = User::select('email')->where('role','=',1)->where('active','=',1)->get()->toArray();
        $pms_arr = [];
        foreach ( $pms as $pm) {
            array_push($pms_arr,$pm['email']);
        }

        //FOR TESTING
        array_push($pms_arr,'rbmolina@absi.ph');
        
        // get all users 2 
        $two = User::select('email')->where('role','=',2)->where('active','=',1)->get()->toArray();
        $two_arr = [];
        foreach ( $two as $tw) {
            array_push($two_arr,$tw['email']);
        }

        // var_dump($two_arr);exit;
        // get all users 2
        // return view('mail.mailer');
        Mail::to($pms_arr)->cc($two_arr)->send(new Mailer([
            'title' => 'The Title',
            'body' => 'The Body',
            'to' => $pms_arr,
            'cc' => $two_arr
        ]));
    }
    
}
