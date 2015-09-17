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
	<title>登録</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
				<h1>登録</h1>
				<form action="input_execute.php" method="post">
					<div class="form-group">
						<label for="news_title">タイトル:</label>
						<input type="text" name="news_title" class="form-control" />
					</div>
					<div class="form-group">
						<label for="news_detail">記事内容:</label>
						<input type="text" name="news_detail" size="80" class="form-control" />
					</div>
					<div class="form-group">
						<label for="show_flg">フラグ:</label>
						<input type="radio" name="show_flg" value="1" /> 表示
						<input type="radio" name="show_flg" value="0" /> 非表示
					</div>
					<div class="form-group">
						<label for="author">著者:</label>
						<input type="text" name="author" class="form-control" />
					</div>
					<p><input type="submit" value="登録" class="btn btn-success btn-xs" /></p>
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