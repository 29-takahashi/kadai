<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header("Location: login.php");    
    }

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
	<title>更新</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
				<h1>更新</h1>
				<form action="update_execute.php" method="post">
					<div class="form-group">
						<label for="news_title">タイトル:</label>
						<input type="text" name="news_title" value="<?php echo $news_title ?>" class="form-control" />
					</div>
					<div class="form-group">
						<label for="news_detail">内容:</label>
						<input type="text" name="news_detail" value="<?php echo $news_detail ?>" class="form-control" />
					</div>
					<div class="form-group">
						<label for="show_flg">フラグ:</label>
						<?php
							if($show_flg === 1) {
								echo '<input type="radio" name="show_flg" value="1" checked /> 表示 ';
								echo '<input type="radio" name="show_flg" value="0" /> 非表示<br />';
							} else {
								echo '<input type="radio" name="show_flg" value="1" /> 表示 ';
								echo '<input type="radio" name="show_flg" value="0" checked /> 非表示<br />';
							}
						?>
					</div>
					<div class="form-group">
						<label for="author">著者:</label>
						<input type="text" name="author" value="<?php echo $author ?>" class="form-control" />
					</div>
					<p><input type="hidden" name="l_id" value="<?php echo $l_id ?>" />
					<input type="submit" value="更新" class="btn btn-success btn-xs" /></p>
				</form>
				<hr>
				<p><a href="index.php"><button class="btn btn-primary btn-xs">管理</button></a>
                <a href="news_list.php"><button class="btn btn-warning btn-xs">一覧</button></a> 
                <a href="session_clear.php"><button class="btn btn-danger btn-xs">ログオフ</button></a></p>
			</div>
		</div>
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>