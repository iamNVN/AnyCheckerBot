<?php

/////////////////////==========[HTTP]==========////////////////

if (strpos($text, "/http") === 0){
            file_put_contents("fresh_http.txt", file_get_contents("https://api.proxyscrape.com/?request=getproxies&proxytype=http&timeout=5000&country=all&ssl=all&anonymity=all"));
            $amount = file_get_contents("https://api.proxyscrape.com?request=amountproxies&proxytype=http&timeout=5000&country=all&ssl=all&anonymity=all");
            $last_updated = file_get_contents('https://api.proxyscrape.com?request=lastupdated&proxytype=http');
            $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot'.$API_KEY.'/sendDocument');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      $post = array(
        'chat_id' => $chat_id,
        'caption' => "*Proxy type:* `HTTPS`\n*Country:* `All`\n*Timeout:* `5000`\n*Total proxy count:* `$amount`\n*Last updated:* `$last_updated`\n*Last updated date:* `$date1`\n\n*Proxy uploaded by $USERNAMEBOT *",
        'parse_mode' => "markdown",
        'reply_to_message_id'=> $message_id,
        'document' => new CURLFile(realpath('fresh_http.txt'))
        );
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

      curl_exec($ch);
          }


/////////////////////==========[SOCKS4]==========////////////////

if (strpos($text, "/socks4") === 0){
            file_put_contents("fresh_socks4.txt", file_get_contents("https://api.proxyscrape.com/?request=getproxies&proxytype=socks4&timeout=5000&country=all"));
            $amount = file_get_contents("https://api.proxyscrape.com?request=amountproxies&proxytype=socks4&timeout=5000&country=all");
            $last_updated = file_get_contents('https://api.proxyscrape.com?request=lastupdated&proxytype=socks4');
            $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot'.$API_KEY.'/sendDocument');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      $post = array(
        'chat_id' => $chat_id,
        'caption' => "*Proxy type:* `SOCKS4`\n*Country:* `All`\n*Timeout:* `5000`\n*Total proxy count:* `$amount`\n*Last updated:* `$last_updated`\n*Last updated date:* `$date1`\n\n*Proxy uploaded by $USERNAMEBOT *",
        'parse_mode' => "markdown",
        "reply_to_message_id"=> $message_id,
        'document' => new CURLFile(realpath('fresh_socks4.txt'))
        );
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

      curl_exec($ch);
          }


/////////////////////==========[SOCKS5]==========////////////////

if (strpos($text, "/socks5") === 0){
            file_put_contents("fresh_socks5.txt", file_get_contents("https://api.proxyscrape.com/?request=getproxies&proxytype=socks5&timeout=5000&country=all"));
            $amount = file_get_contents("https://api.proxyscrape.com?request=amountproxies&proxytype=socks5&timeout=5000&country=all");
            $last_updated = file_get_contents('https://api.proxyscrape.com?request=lastupdated&proxytype=socks5');
            $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot'.$API_KEY.'/sendDocument');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      $post = array(
        'chat_id' => $chat_id,
        'caption' => "*Proxy type:* `SOCKS5`\n*Country:* `All`\n*Timeout:* `5000`\n*Total proxy count:* `$amount`\n*Last updated:* `$last_updated`\n*Last updated date:* `$date1`\n\n*Proxy uploaded by $USERNAMEBOT *",
        'parse_mode' => "markdown",
        "reply_to_message_id"=> $message_id,
        'document' => new CURLFile(realpath('fresh_socks5.txt'))
        );
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

      curl_exec($ch);
          }

?>
