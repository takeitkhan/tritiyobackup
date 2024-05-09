<?php 
    
    $receiver = "01718170799";
    $smscontent = urlencode("Testing");
    $url = "http://app.planetgroupbd.com/api/sendsms/plain?user=habibkhan&password=01673771316&sender=Friend&SMSText=" . $smscontent . "&GSM=88" . $receiver . "";
    //$url = " http://45.125.222.100/boomcast/WebFramework/boomCastWebService/externalApiSendTextMessage.php?masking=NOMASK&userName=PRAN-RFL&password=6650fda4da3483960e430b0701edba0b&MsgType=TEXT&receiver=".$receiver."&message=".$smscontent."";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $data = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    echo "OK";
    
    ?>