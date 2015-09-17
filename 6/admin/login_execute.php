<?php
	$id = $_POST["id"];
	$pw = $_POST["pw"];

	if($id == "admin" & $pw == "password") {
		session_start();
		isset($_SESSION['login']);
	    $_SESSION["login"] = 1;
		header("Location: index.php");
	} else{
		header("Location: login.php");		
	} 
?>