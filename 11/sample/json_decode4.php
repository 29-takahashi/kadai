<?php
// keyid の設定ファイルを読み込む
require("config.php");

// APIのURLを生成
$url  = "http://api.gnavi.co.jp/master/PrefSearchAPI/20150630/?keyid=" . $key_id . "&format=json";

// URL読み込み
$json_data = file_get_contents($url, true);

// jsonをphpで扱いやすいように変更
$data = json_decode($json_data);
// echo '<pre>';
// var_dump($data);
// echo '</pre>';

// 配列に値(都道府県)を代入する
$pref_array = $data->pref;
// var_dump($pref_array);

// 配列からデータを1件ずつ取得し、表示
foreach ($pref_array as $key => $pref_value){
	var_dump($pref_value);
	echo $pref_value->pref_code . ":";
	echo $pref_value->pref_name . "<br>";
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