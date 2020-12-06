<?php
if(strpos($text, "/sk") === 0){

$sec = substr($text, 4);
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}

/////////////////////=-----------[RANDOM CC ](We Don't want Generic Decline. Uff!)==========////////////////

$cc_info_arr[] = "4427323412042742|11|2022|778";
$cc_info_arr[] = "5343058756585058|10|2025|533";
$cc_info_arr[] = "4147203828377230|01|2022|163";
$cc_info_arr[] = "4152850030186221|09|2024|150";
$cc_info_arr[] = "5106043266617135|10|2024|630";
$cc_info_arr[] = "4537476137821332|03|2022|277";
$cc_info_arr[] = "379268117811006|09|2022|5013"; //This one is AMEX -_-
$cc_info_arr[] = "4500353004856035|10|2025|847";
$cc_info_arr[] = "4023600440000414|11|2024|147";
$cc_info_arr[] = "4427325662058237|09|2023|708";
$n = rand(0,9);
$cc_info = $cc_info_arr[$n];

/////////////////////==========[SETUP VARS]==========////////////////

$i = explode("|", $cc_info);
$cc = $i[0];
$mm = $i[1];
$yyyy = $i[2];
$cvv = $i[3];

/////////////////////==========[1st CURL REQ]==========////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=".$cc."&card[exp_month]=".$mm."&card[exp_year]=".$yyyy."&card[cvc]=".$cvv."");
curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);


/////////////////===============[Result]===========///////////////////

if (strpos($result, 'api_key_expired')){
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>❌ DEAD KEY</b>

<u>Key:</u> <code>$sec</code>
<u>Response:</u> <code>Api Key Expired</code>

<b>━━━━━━━━━━━━━
Checked By </b><b>@$username2</b> (<code>$from_id</code>)",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}

/////////////////////////////////////////////////////////////

elseif (empty($sec)){
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>❌ INVALID KEY PROVIDED ❌

Checked By </b><b>@$username2</b> (<code>$from_id</code>)",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}

/////////////////////////////////////////////////////////////

elseif (strpos($sec, 'sk_live_') === false) {
      bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>❌ WTF IS THAT KEY?! ❌

I can only Check SK Keys Nibba! -_-


Checked By </b><b>@$username2</b> (<code>$from_id</code>)",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}

/////////////////////////////////////////////////////////////

elseif (strpos($result, 'Invalid API Key provided')) {
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>❌ DEAD KEY</b>

<u>Key:</u> <code>$sec</code>
<u>Response:</u> <code>Invalid API Key</code>

<b>━━━━━━━━━━━━━
Checked By </b><b>@$username2</b> (<code>$from_id</code>)",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}

/////////////////////////////////////////////////////////////

elseif (strpos($result, 'testmode_charges_only')) {
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>❌ DEAD KEY</b>

<u>Key:</u> <code>$sec</code>
<u>Response:</u> <code>Test Mode Key</code>

<b>━━━━━━━━━━━━━
Checked By </b><b>@$username2</b> (<code>$from_id</code>)",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}

/////////////////////////////////////////////////////////////

elseif (strpos($result, 'test_mode_live_card')) {
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>❌ DEAD KEY</b>

<u>Key:</u> <code>$sec</code>
<u>Response:</u> <code>Test Mode Key</code>

<b>━━━━━━━━━━━━━
Checked By </b><b>@$username2</b> (<code>$from_id</code>)",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}

/////////////////////////////////////////////////////////////

elseif (strpos($result, 'Invalid API Key provided:')) {
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>❌ DEAD KEY</b>

<u>Key:</u> <code>$sec</code>
<u>Response:</u> <code>Invalid API Key</code>

<b>━━━━━━━━━━━━━
Checked By </b><b>@$username2</b> (<code>$from_id</code>)",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}

/////////////////////////////////////////////////////////////

elseif (strpos($result, 'invalid_request_error')) {
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>❌ DEAD KEY</b>

<u>Key:</u> <code>$sec</code>
<u>Response:</u> <code>Invalid API Key</code>

<b>━━━━━━━━━━━━━
Checked By </b><b>@$username2</b> (<code>$from_id</code>)",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}

/////////////////////////////////////////////////////////////

else {
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>✅ LIVE KEY</b>

<u>Key</u>: <code>$sec</code>
<u>Response</u>: <code>Live Key!</code>

<b>━━━━━━━━━━━━━
Checked By </b><b>@$username2</b> (<code>$from_id</code>)",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}}

?>