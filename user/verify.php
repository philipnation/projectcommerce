<?php
//var_dump($_GET['reference']);

$url = 'http://localhost/venormall/user/verify?reference=SQECOM400891873634';

$response = file_get_contents($url);
$data = json_decode($response);

var_dump($data);
?>