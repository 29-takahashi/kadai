<!doctype html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>管理ログイン</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
			    <h1>ログイン</h1>
				<form action="login_execute.php" method="post">
					<p>ID: <input type="text" name="id" value="" />
					Password: <input type="password" name="pw" value="" />
					<input type="submit" value="ログイン" class="btn btn-primary btn-xs" /></p>
				</form>
			</div>
		</div>
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>