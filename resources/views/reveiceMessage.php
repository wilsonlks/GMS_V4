<?php
use Illuminate\Support\Facades\DB;

echo '<title>
Reveice
</title>';

$xml = '<?xml version="1.0" encoding="UTF-8"?>
 <!DOCTYPE jds SYSTEM "/home/httpd/html/dtd/jds2.dtd">
 <jds>
 <account acid = "IPM_IT"  loginid = "IPM_IT_PT" passwd = "Sms@654321">
    <msg_recv>
        <jobid>00000023367058</jobid>
    </msg_recv>
 </account>
 </jds>
 ';


$url = 'https://mlpsmsapi.three.com.mo/v1/externalApi/message';

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/xml; charset=UTF-8"));

curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 

curl_close($ch);



// $testXml = simplexml_load_string($result) or die("ERROR");

// echo "<pre>";
// print_r($testXml );

// echo "<pre>";
// echo $Recipient = $testXml -> msg_recv_ret ->msg ->recipient;
// echo "<pre>";
// echo $Content = $testXml -> msg_recv_ret ->msg ->content;
// echo "<pre>";
// echo  $JOBID = $testXml -> msg_recv_ret ->msg ->jobid;
// echo "<pre>";
// echo $Status =  $testXml -> msg_recv_ret ->msg ->status;
// echo "<pre>";
// echo $Timestamp = $testXml -> msg_recv_ret ->msg ->timestamp;




// $queryState = DB::insert('INSERT INTO receive_xmls(jobid, recipient, content,status, timestamp ) VALUES(?,?,?,?,?)', [$JOBID, $Recipient, $Content, $Status, $Timestamp]);
 

//  if($queryState){

//     echo'Query was successfully save in database';
  
// }else{
//     echo 'There was some error';
// }





?>
