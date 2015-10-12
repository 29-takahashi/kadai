<?php
$url  = "data/sample3.json";
$json_data = file_get_contents($url, true);
$data = json_decode($json_data);
// var_dump($data);
?>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<span><a href="index.php">index.php</a></span>
</body>