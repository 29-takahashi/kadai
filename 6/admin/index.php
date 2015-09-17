<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header("Location: login.php");    
    }
?>

<!doctype html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>管理</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<h1>管理</h1>
				<form action="search_execute.php" method="get"> <!-- 検索する時は、情報が欲しいのでGET -->
					<p>記事ID: <input type="text" name="id" size="5" maxlength="3" placeholder=1 />
					<input type="submit" value="検索" class="btn btn-primary btn-xs" /></p>
				</form>
				<ul class="list-group">
				    <li class="list-group-item"><a href="news_list.php">一覧</a></li>
				    <li class="list-group-item"><a href="input.php">登録</a></li>
				</ul>
				<hr>
				<p><a href="session_clear.php"><button class="btn btn-danger btn-xs">ログオフ</button></a></p>
			</div>
		</div>
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>