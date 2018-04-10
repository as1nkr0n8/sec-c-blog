<?php 
	session_start();
	if (!isset($_SESSION["uid"]))
	{
		header("location: busted.php");
	}
	unset($_SESSION['uid']);
	unset($_SESSION['admin']);
	session_destroy();
	header("location: ../../index.php");
?>