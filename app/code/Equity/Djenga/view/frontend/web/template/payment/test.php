<?php
$url = 'https://api-test.equitybankgroup.com/v1/token/';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Basic VHJ2azY2MXRkUnNDQ01kUm0ydTM2M2ZtZk9BcHhNdTA6SFVNNjdsOGV5Tk5YdWJEcw==',
    'Content-Type: application/x-www-form-urlencoded',
));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'merchantCode=4188171122&password=TGvBoRGAcdzuhCs1l0NW2219IsgXQvLU&grant_type=password');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
// echo $html;
$token = json_decode($html, true);
// numeric/associative array access
echo json_encode($token['payment-token']);
// $_POST['token']=$token['payment-token'];
curl_close($ch);
