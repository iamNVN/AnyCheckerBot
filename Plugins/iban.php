<?php
if(strpos($text, "/iban") === 0){

$combo = substr($text, 6);
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}

/////////////////////==========[1st CURL REQ]==========////////////////

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://bank.codes/iban/validate/'); 
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/x-www-form-urlencoded',
'origin: https://bank.codes',
'referer: https://bank.codes/iban/validate/',
'sec-fetch-dest: document',
'sec-fetch-mode: navigate',
'sec-fetch-site: same-origin'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'iban='.$combo.'');
$result2 = curl_exec($ch); 
$bicsource = trim(strip_tags(GetStr($result2,'SWIFT Code','</table>'))); 
$BIC = trim(strip_tags(GetStr($bicsource,'<td colspan="2">','<'))); 

/////////////////===============[Result]===========///////////////////

if(strpos($result2, 'is a valid IBAN.')){ //If Response Contains "is a Valid IBAN.", then Mark it as Valid
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>✅ LIVE IBAN</b>

<u>🩸IBAN:</u> <code>$combo</code>
<u>🧬Algorithm:</u> <code>Passed</code>

<b>━━━━━━━━━━━━━
Checked By </b><b>@$username2</b> (<code>$from_id</code>)",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}

/////////////////////////////////////////////////////////////

elseif(empty($combo)){ //If there is no IBAN provided.

    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>PROVIDE A IBAN TO CHECK!</b>",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}

/////////////////////////////////////////////////////////////

elseif(strpos($result2, 'is an invalid IBAN.')){ //If Response Contains "is an Invalid IBAN.", then Mark it as Invalid

    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>❌ INVALID IBAN</b>

<u>🩸IBAN:</u> <code>$combo</code>
<u>🧬Algorithm:</u> <code>Failed</code>

<b>━━━━━━━━━━━━━
Checked By </b><b>@$username2</b> (<code>$from_id</code>)",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}

/////////////////////////////////////////////////////////////

else{
	    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>$combo Is Invalid!</b>",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	  ]);
}
}

?>