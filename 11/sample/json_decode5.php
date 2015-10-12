<?php
require("config.php");
$url  = "http://api.gnavi.co.jp/RestSearchAPI/20150630/?keyid=" .$key_id. "&format=json&pref=PREF01";
$json_data = file_get_contents($url, true);
$data = json_decode($json_data);
// var_dump($data);
var_dump($data->rest[0]);
echo "<hr>";
echo $data->rest[0]->name . "<br>";
?>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<span><a href="index.php">index.php</a></span>
</body>