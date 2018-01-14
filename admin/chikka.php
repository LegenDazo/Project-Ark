<?php
    $arr_post_body = array(
        "message_type" => "SEND",
        "mobile_number" => "639994738632",
        "shortcode" => "2929007167",
        "message_id" => "12345678901234567890123456789012",
        "message" => "Welcome to My Service!",
        "client_id" => "2e2d9a76c2bab79ca7df62655d0476b38a2128150ea222b6da1f3aae5dc959e1",
        "secret_key" => "021bc7e38938def005605869d26c5ca4682c634b731eaaf5429af0a8f105b9c1"
    );

    $query_string = "";
    foreach($arr_post_body as $key => $frow)
    {
        $query_string .= '&'.$key.'='.$frow;
    }

    $URL = "https://post.chikka.com/smsapi/request";

    $curl_handler = curl_init();
    curl_setopt($curl_handler, CURLOPT_URL, $URL);
    curl_setopt($curl_handler, CURLOPT_POST, count($arr_post_body));
    curl_setopt($curl_handler, CURLOPT_POSTFIELDS, $query_string);
    curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($curl_handler);
    curl_close($curl_handler);

    exit(0);



?>