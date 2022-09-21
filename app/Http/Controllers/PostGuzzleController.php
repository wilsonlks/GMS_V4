<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\sender;
use App\Models\receiveXml;
use App\Models\department;
use App\Models\MessageDetailSaving;

use xmlwriter;
use DOMDocument;
class PostGuzzleController extends Controller

{

    public function successfulpage(){
        return view('successfulpage');

    }
     public function senderPage(){
        $departments = DB::select('SELECT * from department');

         return view ('senderBuilding',['departments'=>$departments ]);
    }


    public function senderProcess(Request $request){



        $request->validate([
            'content' => 'required|unique:senders|max:160',
            'recipient' => 'required|min:8',
        ]);
        
        $sender = new sender; 

        $sender -> acid = $request -> input('acid');
        $sender->recipient = $request->input('recipient');
        $sender->content = $request->input('content');
        $sender->language = $request->input('language');
        $sender->SenderStatus = "draft";
        $sender->save();
        // $SenderStatus = 3;
        // switch ($SenderStatus) {
        //     case '3':  $SenderSTATUS = "Draft";
        //     DB::update('UPDATE senders SET status= $SenderSTATUS ORDER BY id desc LIMIT 1 ;');
        //         break;
            
           
        
     return redirect('previewpage')->with('status', 'Message is being prepared to send! You can comfirm message detail is right. ');


    }

    public function previewpage()
    {
        $previews = DB::select('SELECT department.acid,senders.language, senders.content,senders.recipient
        FROM senders INNER JOIN department ON department.acid = senders.acid order by `id` desc limit 1;');

        return view('preview',['previews'=>$previews]);

    }


    public function senderHistory(Request $request)
    
    {

//         $senderHistory = DB::select('SELECT senders.id, department.acid, department.loginid,senders.content,senders.language,senders.recipient,senders.SenderStatus
//      FROM senders INNER JOIN department ON department.acid = senders.acid;');

// $senderHistorys = $senderHistory ->paginate(5);
    $senderHistorys = DB::table('senders')
        ->select('senders.id', 'senders.acid', 'senders.content', 'senders.language', 'senders.recipient', 'senders.SenderStatus')
        ->get();

        return view('senderHistory',['senderHistorys'=>$senderHistorys]);




    }



    public function sendMessage()
    {
        $senders = DB::select('SELECT department.acid, department.loginid,senders.language, department.passwd,senders.content,senders.recipient,  senders.id
        FROM senders INNER JOIN department ON department.acid = senders.acid order by `id` desc limit 1;');

        $xml = new XMLWriter();
        $xml->openMemory();
        $xml->startDocument('1.0','UTF-8');
        $xml->startDtd('jds', null, '/home/httpd/html/dtd/jds2.dtd');
        $xml->endDtd();
        $xml->startElement('jds');
        foreach ($senders as $sender) { 
            $xml->startElement('account');
            $xml->writeAttribute('acid', $sender->acid);
            $xml->writeAttribute('loginid', $sender->loginid);
            $xml->writeAttribute('passwd', $sender->passwd); 
            
            $xml->startElement('msg_send');
            $xml->startElement('recipient');
            $xml->text($sender->recipient );
            $xml->endElement();

            $xml->startElement('content');
            $xml->text($sender->content );
            $xml->endElement();

            $xml->startElement('language');
            $xml->text($sender->language );
            $xml->endElement();
            }
        $xml->endElement();
        $xml->endDocument();
       $content = $xml->outputMemory();

        // return response($content)->header('Content-Type', 'text/xml');
    
  $url = 'https://mlpsmsapi.three.com.mo/v1/externalApi/message';

        $ch = curl_init($url);

         curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/xml; charset=UTF-8"));
        
         curl_setopt($ch, CURLOPT_POST, true);
        
         curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     
         $result = curl_exec($ch);

         curl_close($ch); 

         $testXml = simplexml_load_string($result) or die("ERROR");



         $JOBID = $testXml -> msg_send_ret ->msg ->jobid;


        $queryState =  DB::insert('INSERT INTO messagedetailsavings(jobid, acid, senderID  ) VALUES(?,?,?)', [$JOBID, $sender->acid, $sender -> id]);

        $senderquery = DB::update('UPDATE senders SET SenderStatus= "Sending" ORDER BY id desc LIMIT 1 ;');

        
            if($queryState){
                return redirect('successfulpage')->with('status', 'Send Message was successfully save in database');
             }else{
                echo 'There was some error';
            }


    }



   

}
