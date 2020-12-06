<?php
if(strpos($text, "/dict") === 0){

$wordused = substr($text, 6);
$wordcap = ucfirst($wordused);


/////////////////////==========[1st CURL REQ]==========////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://oxforddictionaryapi.herokuapp.com/?define='.$wordused.'&lang=en');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
"Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,hi;q=0.7",
"Host: oxforddictionaryapi.herokuapp.com",
"Sec-Fetch-Dest: empty",
"Sec-Fetch-Mode: cors",
"Sec-Fetch-Site: cross-site",));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$result = curl_exec($ch);
$rresp = json_decode($result, true);

$word = $rresp[0]['word'];
$definition = $rresp[0]['meaning']['noun'][0]['definition'];
$example = $rresp[0]['meaning']['noun'][1]['example'];

/////////////////////==========[Result]==========////////////////


if($definition){
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Search Results extracted from @IndianBots Database for the Word:- </b><code>$wordcap</code>


<b><ins>Definition</ins>:-</b> <code>$definition</code>

<b><ins>Example</ins>:-</b> <code>$example</code>

<b>━━━━━━━━━━━━━
Checked By </b><b>@$username2</b> ",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}

/////////////////////////////////////////////////////////////

else{
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>❌ NO MEANING FOUND ❌

Checked By</b> <b>@$username2</b>",
'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}}

?>