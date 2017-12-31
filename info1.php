<?php 

ob_start();

$API_KEY = '517002310:AAEQW7hGNKz4OQwWRDogGcbku6SnDxI_kGs';
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$send = $message->$send;
$chat_id = $message->chat->id;


if($send == "/start"){
	bot('sendMessage',
		['chat_id'=>$chat_id,
		'send'=>"welcome ♥️ ",]);
}

    
