<?php

////////////////=========[GETTING UPDATES]=========////////////////

$update = json_decode(file_get_contents("php://input"));


////////////////=========[VARIABLES FROM CONFIG]=========////////////////

$API_KEY = $_ENV['BOT_TOKEN'];
$USERNAMEBOT = $_ENV['BOT_USERNAME'];
$WEATHER_API = $_ENV['WEATHER_API_KEY'];
$TG_DUMP_CHAT = $_ENV['TG_DUMP_CHAT'];
$TIMEZONELOG = $_ENV['TIMEZONE'];


/////////////////////////////////////////////////////////////////

date_default_timezone_set($TIMEZONELOG); //Default Timezone
$date1 = date("h:i:s d-m-Y"); //Current Date and Time for Logging


////////////////=========[VARIABLES OF MESSAGE]=========////////////////

$message = $update->message; //Message
$text = $update->message->text; //Text in Message
$chat_id = $update->message->chat->id; //Chat ID
$from_id = $update->message->from->id; //User ID
$message_id = $update->message->message_id; //Message ID
$from_fname = $message->from->first_name; //First Name
$username2 = $update->message->from->username; //Username


////////////////=========[VARIABLES OF REPLIED TO MESSAGE]=========////////////////

$replychatid = $update->message->reply_to_message->from->id; //Replied to Message USER ID
$replyfirstname = $update->message->reply_to_message->from->first_name; //Replied to Message FIRST NAME
$reply_username = $message->reply_to_message->forward_from->username;  //Replied to Message USER NAME


////////////////=========[VARIABLES OF CALLBACK DATA]=========////////////////

$first = $update->callback_query->from->first_name; //First Name from Callback Data
$username = $update->callback_query->from->username; //Username from Callback Data
$data = $update->callback_query->data; //Callback Data
$chatid = $update->callback_query->message->chat->id; //Chat ID from Callback Data
$messageid = $update->callback_query->message->message_id; //Message ID from Callback Data


?>
