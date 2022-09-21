<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Models\receiveXml;
use App\Models\department;
use App\Models\sender;
use App\Models\messagedetailsaving;
use xmlwriter;
class receiveContronller extends Controller
{
    
    public function receiveXml(){
    $messagedetailsavings = DB::select('SELECT department.acid, department.loginid,messagedetailsavings.jobid, 
    department.passwd, messagedetailsavings.senderID 
                                            FROM messagedetailsavings 
                                            INNER JOIN department ON department.acid = messagedetailsavings.acid order by `jobid` desc limit 1;');

        $xml = new XMLWriter();
        $xml->openMemory();
        $xml->startDocument('1.0','UTF-8');
        $xml->startDtd('jds', null, '/home/httpd/html/dtd/jds2.dtd');
        $xml->endDtd();
        $xml->startElement('jds');
        foreach ($messagedetailsavings as $messagedetailsaving ) { 
            $xml->startElement('account');
            $xml->writeAttribute('acid', $messagedetailsaving->acid);
            $xml->writeAttribute('loginid', $messagedetailsaving->loginid);
            $xml->writeAttribute('passwd', $messagedetailsaving->passwd);  

            $xml->startElement('msg_recv');
            $xml->startElement('jobid');
            $xml->text($messagedetailsaving->jobid);
            $xml->endElement();  
        }
        $xml->endElement();
        $xml->endDocument();
        $contentReceive = $xml->outputMemory();
            //   return response($contentReceive)->header('Content-Type', 'text/xml');


$url = 'https://mlpsmsapi.three.com.mo/v1/externalApi/message';

 $ch = curl_init($url);

curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/xml; charset=UTF-8"));

 curl_setopt($ch, CURLOPT_POST, true);

 curl_setopt($ch, CURLOPT_POSTFIELDS, $contentReceive );

 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


 $result = curl_exec($ch); 


 curl_close($ch);


    $testXml = simplexml_load_string($result) or die("ERROR");

    $Recipient = $testXml -> msg_recv_ret ->msg ->recipient;

    $Content = $testXml -> msg_recv_ret ->msg ->content;

    $JOBID = $testXml -> msg_recv_ret ->msg ->jobid;

    $Status =  $testXml -> msg_recv_ret ->msg ->status;
        
    $Timestamp = $testXml -> msg_recv_ret ->msg ->timestamp;
        switch ($Status) {
            case '2':  $SSTATUS = "Success";
               
      $queryState = DB::insert('INSERT INTO receive_xmls(jobid, recipient, content,status, timestamp,acid, senderid   ) VALUES(?,?,?,?,?,?,?)', [$JOBID, $Recipient, $Content, $SSTATUS, $Timestamp, $messagedetailsaving->acid,  $messagedetailsaving->senderID ]);
 
      $senderquery = DB::update('UPDATE senders SET SenderStatus = "Success" ORDER BY id desc LIMIT 1 ;');

        if($queryState){  return redirect('logMessage')->with('status', 'Send Message was successfully save in database' );
  
            }else{
                echo 'There was some error';
            }
 break;
 case '5':  $SSTATUS = "Failed";
               
 $queryState = DB::insert('INSERT INTO receive_xmls(jobid, recipient, content,status, timestamp,acid, senderid   ) VALUES(?,?,?,?,?,?,?)', [$JOBID, $Recipient, $Content, $SSTATUS, $Timestamp, $messagedetailsaving->acid,  $messagedetailsaving->senderID ]);

 $senderquery = DB::update('UPDATE senders SET SenderStatus = "Failed" ORDER BY id desc LIMIT 1 ;');

   if($queryState){  return redirect('logMessage')->with('status', 'Send Message was successfully save in database' );

       }else{
           echo 'There was some error';
       }
break;

 
            
           
        }


}

}

