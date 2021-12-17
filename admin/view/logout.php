<?php
session_start();
if(isset($_SESSION["username"])){
	unset($_SESSION);
	session_destroy();
	echo 'hello';
	header("location:index.php");
	exit();
}
?>