<?php
if(strpos($text, "/cash") === 0){

$combo = substr($text, 6);
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}
$fromvalue = multiexplode(array(" "), $combo)[0];
$from = multiexplode(array(" "), $combo)[1];
$to = multiexplode(array(" "), $combo)[2];
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}


$get20 = file_get_contents('https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency='.$from.'&to_currency='.$to.'&apikey=-xyz');
$value = trim(strip_tags(GetStr($get20,' Exchange Rate": "','"'))); 

$ratev2 = $fromvalue*$value;
$roundrate = explode('.', $ratev2);


/////////////////===============[Result]===========///////////////////
	
if(strpos($get20, 'Invalid API call')){ 
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>That's not a Valid Currency or it is an Invalid Syntax</b>

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
	'text'=>"<b>🌐 Converted $from $to To $to2

🔹Price = $roundrate[0] $to2


🌀 Converted By $USERNAMEBOT</b>",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	
  ]);


}
}


?>
