<!doctype html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>登録</title>
</head>
<body>
<h1>登録</h1>
<form action="input_execute.php" method="post">
	タイトル: <input type="text" name="news_title" /><br />
	記事内容: <input type="text" name="news_detail" size="80" /><br />
	フラグ: <input type="radio" name="show_flg" value="1" />表示
	<input type="radio" name="show_flg" value="0" />非表示<br />
	著者: <input type="text" name="author" /><br />
	<input type="submit" value="登録" />
</form>
<hr>
<p><a href="index.php">管理</a></p>
</body>
</html>