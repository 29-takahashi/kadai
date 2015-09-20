<?php include("header.php"); ?>

<h1>ログイン</h1>
<form action="login_execute.php" method="post">
	<p>ID: <input type="text" name="id" value="" />
	Password: <input type="password" name="pw" value="" />
	<input type="submit" value="ログイン" class="btn btn-primary btn-xs" /></p>
</form>

<?php include("footer.php"); ?>