<?php
    include("check.php");

	$news_title = $_POST["news_title"];
	$news_detail = $_POST["news_detail"];
	$show_flg = $_POST["show_flg"];
	$author = $_POST["author"];

	$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
	$sql = "INSERT INTO news (news_id,category_id, news_title, news_detail, show_flg, author, create_date, update_date) VALUES (NULL, '" .$news_title. "', '" .$news_detail. "', '" .$show_flg.  "', '" .$author. "', sysdate(), sysdate()) ";
	// var_dump($sql);
	$stmt = $pdo->prepare($sql);
	$result = $stmt->execute();
	if($result) {
		echo "データが登録できました";
		echo "<a href=news_list.php>一覧へ</a>";
	} else {
		echo "データの登録に失敗しました";
	}
	$pdo = null;
?>