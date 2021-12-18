<?php 
$username = $_POST["username"];
$password = $_POST["password"];
if($username == "doannhom" && $password == "123456"){
	header('Location:index1.php');
	die();
}else{
	header('Location:register.php');
	die();
}
?>