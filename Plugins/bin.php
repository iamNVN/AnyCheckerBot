<?php
if(strpos($text, "/bin") === 0){

$bin1 = substr($text, 5);
$bin = substr($bin1, 0, 6);
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};


/////////////////////==========[1st CURL REQ]==========////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin1.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$phone = GetStr($fim, '"phone":"', '"');
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
$emoji = GetStr($fim, '"emoji":"', '"');
$currency = GetStr($fim, '"currency":"', '"');
$binlenth = strlen($bin);
$schemename = ucfirst("$scheme");
$typename = ucfirst("$type");


/////////////////////==========[Unavailable if empty]==========////////////////


if (empty($schemename)) {
	$schemename = "Unavailable";
}
if (empty($typename)) {
	$typename = "Unavailable";
}
if (empty($brand)) {
	$brand = "Unavailable";
}
if (empty($bank)) {
	$bank = "Unavailable";
}
if (empty($name)) {
	$name = "Unavailable";
}
if (empty($phone)) {
	$phone = "Unavailable";
}


/////////////////////==========[Result]==========////////////////


if($binlenth < '6'){ //If Bin Length is Less than 6, Then it is Invalid. Because to get Bin info, it should have minimum 6 Digits -_-
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>❌ INVALID BIN LENGTH ❌

Checked By</b> <b>@$username2</b>",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}

/////////////////////////////////////////////////////////////

elseif($fim){ //If Response from Bin Lookup Site exists

    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"BIN/IIN: <code>$bin</code> $emoji
Card Brand: <b><ins>$schemename</ins></b>
Card Type: <b><ins>$typename</ins></b>
Card Level: <b><ins>$brand</ins></b>
Bank Name: <b><ins>$bank</ins></b>
Country: <b><ins>$name</ins> - 💲<ins>$currency</ins></b>
Issuers Contact: <b><ins>$phone</ins></b>
<b>━━━━━━━━━━━━━
Checked By </b><b>@$username2</b> (<code>$from_id</code>)",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}

/////////////////////////////////////////////////////////////

else{ //If No response, Mark it as Invalid Bin

    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>❌ INVALID BIN ❌

Checked By</b> <b>@$username2</b>",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}}

?>