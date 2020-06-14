<?php

function curl_send_jawalsms_message($phone, $message)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://www.jawalsms.net/httpSmsProvider.aspx");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['content-type: multipart/form-data']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'username' => 'althemar',
        'password' => '0105396200',
        'unicode'  => 'E',
        'mobile'   => $phone,
        'message'  => $message,
        'sender'   => 'althemar',
    ]);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}