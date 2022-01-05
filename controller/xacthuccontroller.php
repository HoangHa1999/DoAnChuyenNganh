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
        $alert = '<div class="alert alert-danger" role="alert"> Mã xác thực không chính xác. Vui lòng kiểm tra lại! </div>';
		include './view/xacthuc.php';
		exit;
    }
  
    $data = $ngd->capnhatpass($email, $pw);
    if($data)
	{
        $alert = '<div class="alert alert-success" role="alert"> Cập nhật mật khẩu thành công! </div>';
		include './view/xacthuc.php';
		exit;
    }else{
        $alert = '<div class="alert alert-danger" role="alert"> Cập nhật mật khẩu thất bại! </div>';
		include './view/xacthuc.php';
		exit;
    }
}
?>