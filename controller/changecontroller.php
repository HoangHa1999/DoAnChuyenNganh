<?php
if(!isset($_SESSION))
{
    session_start();               
}


$action=isset($_GET['action'])?$_GET['action']:'index';
$sp=new sanphammodel();
$ngd = new nguoidungmodel();

if($action=='index')
{
	$data=$sp->all();
	include './view/index.php';
}

if($action=='changepass')
{
	include './view/changepass.php';
}

if($action=='submit')
{
    $pwcu = md5($_POST['txt_passwordCu']);
    $pwmoi = $_POST['txt_password'];
	$nguoidung = $ngd->nguoidungcoma($_SESSION["idnguoidung"]);
	$email = $nguoidung[0]['email'];
   
	if($ngd->nguoidungcopass($pwcu)<=0){
		$alert = '<center><div class="alert alert-danger" role="alert"> Mật khẩu không chính xác. </div></center>';
		include './view/changepass.php';
		exit;
		
    }
    
    $pwmoi = md5($pwmoi);
    $data = $ngd->capnhatpass($email, $pwmoi);

	if($data)
	{
		$alert = '<center><div class="alert alert-success" role="alert"> Đổi mật khẩu thành công!. </div></center>';
		include './view/changepass.php';
		exit;
	}else{
		$alert = '<center><div class="alert alert-danger" role="alert"> Đổi mật khẩu thất bại!. </div></center>';
		include './view/changepass.php';
		exit;
	}
}
?>
