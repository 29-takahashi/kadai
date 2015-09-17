<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header("Location: login.php");    
    }

	$l_id = $_GET["id"];
	$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
	// id を直接代入せず、:idを入れる
	$sql = "SELECT * FROM news WHERE news_id = $l_id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(':id', $l_id, PDO::PARAM_INT);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// HTML出力用の変数 $view を宣言
	$view = "";
	// $view に表示する文字列を追記していく
	$view .= "<table>";
	foreach($results as $row) {
		$view .= "<tr>";
		$view .= "<td><a href=update.php?id=" . $row["news_id"] . ">" . $row["news_id"] . "</a></td>";
		$view .=  "<td><a href=update.php?id=" . $row["news_id"] . ">" . $row["news_title"] . "</a></td>";
		$view .= "</tr>";
	}
	// table閉じタグで終了
	$view .= "</table>";
	$pdo = null;
?>

<!doctype html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>検索結果</title>
</head>

<body>
	<h1>検索結果</h1>
	<?php echo $view ?>
	<hr>
	<a href="index.php">管理画面</a> 
</body>
</html>