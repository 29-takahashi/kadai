
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
</head>

<body>
	<h1>管理</h1>
	<ul>
	    <li>
		    <!-- 検索する時は、情報が欲しいのでGET -->
			<form action="search_execute.php" method="get">
				記事ID: <input type="text" name="id" value="" />
				<input type="submit" />
			</form>
		</li>
	    <li><a href="news_list.php">一覧</a></li>
	    <li><a href="input.php">登録</a></li>
	</ul>
	<hr>
	<p><a href="session_clear.php">ログオフ</a></p>
</body>
</html>