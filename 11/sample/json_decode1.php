<?php
// ファイルパスを指定
$url  = "data/sample1.json";

// ファイルを読み込み
$json_data = file_get_contents($url, true);

// jsonをphpで扱いやすいように変更
$data = json_decode($json_data);
echo '<pre>';
var_dump($data);
echo '</pre>';

// キーと値を表示
foreach ($data as $key => $value){
	echo $key . " = " .$value . "<br>";
}
?>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<span><a href="index.php">index.php</a></span>
</body>