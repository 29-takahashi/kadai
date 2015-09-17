<?php
	$l_id = $_GET["id"];
	$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
	$sql = "SELECT * FROM news WHERE news_id = $l_id";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach($results as $row) {
		$news_title = $row["news_title"];
		$news_detail = $row["news_detail"];
		$show_flg = $row["show_flg"];
		$author = $row["author"];
	}
	$pdo = null;
?>
<html>
<body>
	<form action="update_execute.php" method="post">
		タイトル: <input type="text" name="news_title" value="<?php echo $news_title ?>" /><br />
		記事内容: <input type="text" name="news_detail" value="<?php echo $news_detail ?>" /><br />
		フラグ: <input type="text" name="show_flg" value="<?php echo $show_flg ?>" /><br />
		著者: <input type="text" name="author" value="<?php echo $author ?>" /><br />
		<input type="hidden" name="l_id" value="<?php echo $l_id ?>" />
		<input type="submit" value="更新" />
	</form>
</body>
</html>