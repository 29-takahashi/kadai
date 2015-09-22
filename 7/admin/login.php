<?php include("header.php"); ?>

<div class="well well-lg text-center">
	<form action="login_execute.php" method="post">
		<p><input type="text" name="id" placeholder="ID" /></p>
		<p><input type="password" name="pw" placeholder="Password" /></p>
		<p><input type="submit" value="ログイン" class="btn btn-success" /></p>
	</form>
</div>

<?php include("footer.php"); ?>