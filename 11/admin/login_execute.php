<?php
	$id = $_POST["id"];
	$pw = $_POST["pw"];

	if($id == "admin" && $pw == "password") {
		session_start();
		isset($_SESSION['login']);
	    $_SESSION["login"] = 1;
		header("Location: index.php");
		exit;
	} else{
		header("Location: login.php?error=1"); //エラーコードを渡して原因を特定してあげる
		exit;
	} 
?>