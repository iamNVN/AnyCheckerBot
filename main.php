<?php

ob_start();

$API_KEY = $_ENV['BOT_TOKEN'];
$USERNAMEBOT = $_ENV['BOT_USERNAME'];
define('API_KEY',$API_KEY);


///////////===[IMPORTING RESOURCES]===///////////

include "./Resources/Vars.php";
include "./Resources/Functions.php";


///////////===[IMPORTING PLUGINS]===///////////

include "./Plugins/bin.php";
include "./Plugins/iban.php";
include "./Plugins/stripekey.php";
include "./Plugins/weather.php";
include "./Plugins/dictionary.php";
include "./Plugins/proxy.php";


////////////////=========[START MESSAGE]=========////////////////

if(strpos($text, "/start") === 0){
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Hey $from_fname,

I'm $USERNAMEBOT. I can do several Things!😆

Click the Button Below to open help menu!</b>",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	'reply_markup'=>json_encode(['inline_keyboard'=>[
	[['text'=>"Help 💬",'callback_data'=>"help"]],[['text'=>"Our Channel 🌐",'url'=>"https://t.me/IndianBots"],['text'=>"My Source Code ✅",'url'=>"https://github.com/IndianBots/AnyCheckerBot"]]
  ],'resize_keyboard'=>true])
	
  ]);

}

////////////////=========[HELP MENU]=========////////////////

if($data == "help"){ //Sends Help Menu if Help Button is clicked
	bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"<b>Hello there! I'm $USERNAMEBOT
I can do Several Things!</b>

Click on the buttons below to get documentation about specific modules!",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode(['inline_keyboard'=>[
	[['text'=>"Bin Checker",'callback_data'=>"bin"],['text'=>"Weather",'callback_data'=>"weather"],['text'=>"Proxy",'callback_data'=>"proxy"]],[['text'=>"Git Info",'callback_data'=>"comms"],['text'=>"IBAN Checker",'callback_data'=>"iban"],['text'=>"SK Checker",'callback_data'=>"stripe"]],
	],'resize_keyboard'=>true])
	]);
}


////////////////=========[HELP MENU]=========////////////////

if(strpos($text, "/help") === 0){ //Sends Help Menu if User sent /help. 
	bot('sendmessage',[    //Can't use "OR" Operator because it edits the Message in Callback Query and Sends Message in /help.
	'chat_id'=>$chat_id,
	'text'=>"<b>Hello there! I'm $USERNAMEBOT
I can do Several Things!</b>

Click on the buttons below to get documentation about specific modules!",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	'reply_markup'=>json_encode(['inline_keyboard'=>[
	[['text'=>"Bin Checker",'callback_data'=>"bin"],['text'=>"Weather",'callback_data'=>"bots"],['text'=>"Channels & Groups",'callback_data'=>"channels"]],[['text'=>"Git Info",'callback_data'=>"comms"],['text'=>"IBAN Checker",'callback_data'=>"iban"],['text'=>"SK Checker",'callback_data'=>"stripe"]],
	],'resize_keyboard'=>true])
	]);
}


////////////////=========[BIN INFO]=========////////////////

if($data == "bin"){
	bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"<b>🌀 Bin Checker 🌀

Command:</b>

/bin <code>&lt;bin&gt;</code> - Checks the Bin and Provides Information",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode(['inline_keyboard'=>[
	[['text'=>"Return",'callback_data'=>"help"]],
	],'resize_keyboard'=>true])
	]);
}


////////////////=========[WEATHER INFO]=========////////////////

if($data == "weather"){
	bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"<b>🌀 Weather Info 🌀

Command:</b>

/weather <code>&lt;Name of City&gt;</code> - Provides the Current Weather of the Provided City.

<b>Note:-</b> <code>It only Supports Cities.</code>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode(['inline_keyboard'=>[
	[['text'=>"Return",'callback_data'=>"help"]],
	],'resize_keyboard'=>true])
	]);
}


////////////////=========[IBAN CHECKER]=========////////////////

if($data == "iban"){
	bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"<b>🌀 IBAN Checker 🌀

Command:</b>

/iban <code>&lt;iban&gt;</code> - Checks if the Provided IBAN is Valid or Invalid.",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode(['inline_keyboard'=>[
	[['text'=>"Return",'callback_data'=>"help"]],
	],'resize_keyboard'=>true])
	]);
}


////////////////=========[STRIPE KEY CHECKER]=========////////////////

if($data == "stripe"){
	bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"<b>🌀 SK Key Checker 🌀

Command:</b>

/sk <code>&lt;sk_live_xxxx&gt;</code> - Checks if the Provided Stripe API Key is Valid or Invalid.",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode(['inline_keyboard'=>[
	[['text'=>"Return",'callback_data'=>"help"]],
	],'resize_keyboard'=>true])
	]);
}


////////////////=========[PROXY]=========////////////////

if($data == "proxy"){
	bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"<b>🌀 Proxy Scrapper 🌀

Command:</b>

/http - Sends Fresh HTTPs Proxies
/socks4 - Sends Fresh Socks4 Proxies
/socks5 - Sends Fresh Socks5 Proxies",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode(['inline_keyboard'=>[
	[['text'=>"Return",'callback_data'=>"help"]],
	],'resize_keyboard'=>true])
	]);
}

?>
