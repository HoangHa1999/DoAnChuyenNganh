<?php 
$btn_XuLy = $_POST["btn_XuLy"];
switch ($btn_XuLy) {
	case "dangnhap":
		header("Location: login.php");
		die;
		break;
	case "dangky":
		header("Location: index.php");
		die;
		break;

}
?>