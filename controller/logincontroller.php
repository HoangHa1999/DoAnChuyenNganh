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
	$alert = '<div class="alert alert-danger" role="alert"> Đăng nhập thất bại tài khoản email hoặc mật khẩu của bạn không chính xác </div>';
	include './view/login.php';
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