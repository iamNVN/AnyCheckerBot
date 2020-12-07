<?php
if(strpos($text, "/covid") === 0){

$combo = substr($text, 6);
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}
$cval = multiexplode(array(" "), $combo)[0];
$from = multiexplode(array(" "), $combo)[1];
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}


/////////////////////////////////////////////////////////////

if (($from == " ") || ($from == "")){
$get20 = file_get_contents('https://coronavirus-19-api.herokuapp.com/all');
$cases = trim(strip_tags(GetStr($get20,'"cases":',','))); 
$death = trim(strip_tags(GetStr($get20,'"deaths":',','))); 
$recover = trim(strip_tags(GetStr($get20,'"recovered":','}'))); 


bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>🦠 Worldwide Covid-19 Stats 🦠

🔹 Total Cases: <code>$cases</code>
🔸 Total Deaths: <code>$death</code>
🔹 Total recovered: <code>$recover</code>

🌀 Stats Collected By $USERNAMEBOT</b>",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);


}


/////////////////////////////////////////////////////////////

else {

$get21 = file_get_contents('https://coronavirus-19-api.herokuapp.com/countries/'.$from.'');
$tcase = trim(strip_tags(GetStr($get21,'"cases":',','))); 
$todaycase = trim(strip_tags(GetStr($get21,'"todayCases":',','))); 
$tdeath = trim(strip_tags(GetStr($get21,'"deaths":',','))); 
$todaydeath = trim(strip_tags(GetStr($get21,'"todayDeaths":',','))); 
$trecover = trim(strip_tags(GetStr($get21,'"recovered":',','))); 


bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>🦠 Covid-19 Stats for $from 🦠

🔹 Total Cases: <code>$tcase</code>
🔸 Total Deaths: <code>$tdeath</code>
🔹 Total recovered: <code>$trecover</code>

🔸 Cases Today: <code>$todaycase</code>
🔹 Deaths Today: <code>$todaydeath</code>


🌀 Stats Collected By $USERNAMEBOT</b>",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);
}}


/////////////////////////////////////////////////////////////

?>
