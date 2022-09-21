<?php


namespace App\Helpers;
use Request;
use App\Models\sender;
use App\Models\receiveXml;


class logMessage
{


    public static function addToLog($subject)
    {
    	$log = [];
        $log['jobid'] = $jobid;
    	$log['acid'] = $acid;
        $log['recipient'] = $recipient;
    	$log['Language'] = $Language;
        $log['content'] = $content;
        $log['timestamp'] = $timestamp;
        $log['status'] = $status;


    	receiveXml:create($log);
    }


    public static function logActivityLists()
    {
    	return receivexml::join('senders', 'senders.id', '=', 'receive_xmls.senderid')
        ->get();

    }


    // public 


}