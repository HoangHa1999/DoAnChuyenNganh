<?php
if(!isset($_SESSION))
{
    session_start();               
}

$action=isset($_GET['action'])?$_GET['action']:'index';
$ngd=new nguoidungmodel();

if($action=='index')
{
	$data=$sp->all();
	include './view/index.php';
}

if($action=='xacthuc')
{
    include './view/xacthuc.php';
}

if($action=='submit')
{
    $email = $_SESSION["email"];
    $nguoidung = $ngd->laynguoidungcoemail($email);
    $pw = md5($_POST['txt_password']);
    $mxt = $_POST['txt_mxt'];

   
    if($nguoidung[0]['maxacthuc'] != $mxt)
    {
        $message = "Mã xác thực không chính xác. Vui lòng kiểm tra lại!";
		echo "<script type='text/javascript'>alert('$message');</script> Nhấn vào đây để <a href='javascript: history.go(-1)'>Trở lại</a>";	
		exit;
    }
  
    $data = $ngd->capnhatpass($email, $pw);
	$message = "Cập nhật mật khẩu thành công!";
					echo "<script type='text/javascript'>alert('$message');</script> Nhấn vào đây để <a href='index.php?controller=logincontroller&action=login'>Đăng nhập</a>";
					exit;
}
?>