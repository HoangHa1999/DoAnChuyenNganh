<?php

if(!isset($_SESSION)){
	session_start();               
}

$action=isset($_GET['action'])?$_GET['action']:'index';
$sp=new sanphammodel();
$ngd=new nguoidungmodel();

if($action=='index')
{
	$data=$sp->all();
	include './view/index.php';
}

if($action=='login')
{
    include './view/login.php';
}

if($action=='submit')
{
    $email =$_POST['txt_email'];
	$pw = md5($_POST['txt_password']);

	$result = $ngd->all();
	foreach($result as $value)
	{
		if($value['email'] == $email && $value['password'] == $pw){
			$_SESSION["idnguoidung"]=$value['id_ngd'];
			
            header("location: index.php");
            exit();
		}
	}
	$message = "Đăng nhập thất bại. Vui lòng kiểm tra lại tài khoản và mật khẩu.";
			echo "<script type='text/javascript'>alert('$message');</script> Nhấn vào đây để <a href='javascript: history.go(-1)'>Trở lại</a>";
			exit;	

}

if($action='logout')
{
	if(isset($_SESSION["idnguoidung"])){
	unset($_SESSION);
	session_destroy();
	header("location:index.php");
	exit();
	}
}


?>