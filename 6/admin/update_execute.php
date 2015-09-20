<?php
	include("check.php");

	$l_id = $_POST["l_id"];
	$news_title = $_POST["news_title"];
	$news_detail = $_POST["news_detail"];
	$show_flg = $_POST["show_flg"];
	$author = $_POST["author"];

	$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
	$sql = "UPDATE news set news_id = '" .$l_id. "', news_title = '" .$news_title. "', news_detail = '" .$news_detail. "', show_flg = " .$show_flg. ", author = '" .$author. "', update_date = sysdate() WHERE news_id = $l_id";
	$stmt = $pdo->prepare($sql);
	$result = $stmt->execute();
	if($result) {
		echo "データが更新できました。<br><hr>";
		echo "<a href=news_list.php>一覧</a>|<a href=index.php>管理</a>";
	} else {
		echo "データの登録に失敗しました。<br><hr>";
		echo "<a href=news_list.php>一覧</a>|<a href=index.php>管理</a>";
	}
	$pdo = null;
?>