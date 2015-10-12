<?php
// ファイルパスを指定
$url  = "data/sample2.json";

// ファイルを読み込み
$json_data = file_get_contents($url, true);

// jsonをphpで扱いやすいように変更
$data = json_decode($json_data);
// var_dump($data);

// キーと値を表示
foreach ($data as $key => $value){
	if (!is_object($value)) {
		echo $key . " = " .$value . "<br>";
	} else {
		echo $key . "<br>";
		foreach ($value as $key => $value2) {
			echo "　" . $key . " = " .$value2 . "<br>";
		}
	}
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