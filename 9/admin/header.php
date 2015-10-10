<!doctype html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>Nice daddy管理画面</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target="#mainNav">
					<span class="sr-only">ナビゲーション</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand">管理画面</a>
			</div>
			<div class="collapse navbar-collapse" id="mainNav">
				<ul class="nav navbar-nav">
					<li><a href="news_list.php">一覧</a></li>
		            <li><a href="input.php">登録</a></li>
		            <li>
				        <form action="search_execute.php" method="get" class="navbar-form">
							<div class="form-group">
								<input type="text" class="form-control" name="id" size="5" maxlength="3" placeholder="記事ID" />
								<input type="submit" value="検索" class="btn btn-primary btn-xs" />
							</div>
						</form>	
		            </li>
				</ul>
				<ul class="nav navbar-nav navbar-right">				
					<li><a href="../index.php">サイト表示</a></li>				
					<li><a href="session_clear.php"><button class="btn btn-danger btn-xs">ログオフ</button></a></li>				
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">