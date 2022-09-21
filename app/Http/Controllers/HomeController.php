<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\sender;

class HomeController extends Controller
{
    
 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    ///public function senderlog()
    //{
        //\LogActivity::addToLog('My Testing Add To Log.');
        //dd('log insert successfully.');
    //}


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logMessage()
    {
        $logs = \logMessage::logActivityLists();
        return view('logMessage',compact('logs'));
    }



    public function dashboardV2()
    {
        $Senders = sender::where('SenderStatus','draft')->count();
        $percentage = $Senders / sender::all()->count();

        return view('dashboardV2',compact('Senders', 'percentage'));



    }
    

}