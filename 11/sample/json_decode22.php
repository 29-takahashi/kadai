<?php
// ファイルパスを指定
$url  = "data/sample2.json";

// ファイルを読み込み
$json_data = file_get_contents($url, true);

// jsonをphpで扱いやすいように変更
$data = json_decode($json_data);
echo '<pre>';
var_dump($data);
echo '</pre>';

// 値を表示
echo $data->name . "<br>";
echo $data->gender . "<br>";
echo $data->info->living . "<br>";
echo $data->info->birthday . "<br>";
?>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<span><a href="index.php">index.php</a></span>
</body>