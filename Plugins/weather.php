<?php
if(strpos($text, "/weather") === 0){

$placegay = substr($text, 9);


/////////////////////==========[1st CURL REQ]==========////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://api.openweathermap.org/data/2.5/weather?q='.$placegay.'&appid=89ef8a05b6c964f4cab9e2f97f696c81');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
"Accept: */*",
"Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,hi;q=0.7",
"Host: api.openweathermap.org",
"sec-fetch-dest: empty",
"sec-fetch-site: same-site"));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$result = curl_exec($ch);
$rresp = json_decode($result, true);

$weather = $rresp['weather'][0]['main'];
$description = $rresp['weather'][0]['description'];
$temp = $rresp['main']['temp'];
$humidity = $rresp['main']['humidity'];
$feels_like = $rresp['main']['feels_like'];
$country = $rresp['sys']['country'];
$name = $rresp['name'];
$kelvin = 273;
$celcius = $temp - $kelvin;
$feels = $feels_like - $kelvin;
$capsdes = ucfirst($description);
$coutryemoji = getFlags($country);


/////////////////////==========[Result]==========////////////////


if($weather){
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>🌝 Current Weather at <ins>$placegay</ins>

<ins>Status</ins>:</b> $capsdes
<b><ins>Temperature</ins>:</b> $celcius °C
<b><ins>Feels Like</ins>:</b> $feels °C
<b><ins>Humidity</ins>:</b> $humidity
<b><ins>Country</ins>:</b> $country $coutryemoji

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
	'text'=>"<b>❌ INVALID LOCATION PROVIDED ❌

Checked By</b> <b>@$username2</b>",
'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}}

?>