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
<!doctype html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>登録</title>
</head>
<body>
	<h1>登録</h1>
	<form action="update_execute.php" method="post">
		<p>
		タイトル: <input type="text" name="news_title" value="<?php echo $news_title ?>" /><br />
		内容: <input type="text" name="news_detail" value="<?php echo $news_detail ?>" /><br />
		フラグ:
		<?php
			if($show_flg === 1) {
				echo '<input type="radio" name="show_flg" value="1" checked />表示';
				echo '<input type="radio" name="show_flg" value="0" />非表示<br />';
			} else {
				echo '<input type="radio" name="show_flg" value="1" />表示';
				echo '<input type="radio" name="show_flg" value="0" checked />非表示<br />';
			}
		?>
		著者: <input type="text" name="author" value="<?php echo $author ?>" /><br />
		<input type="hidden" name="l_id" value="<?php echo $l_id ?>" />
		<input type="submit" value="更新" />
		</p>
	</form>
	<hr>
	<p><a href="news_list.php">一覧</a> | <a href="index.php">管理</a></p>
</body>
</html>