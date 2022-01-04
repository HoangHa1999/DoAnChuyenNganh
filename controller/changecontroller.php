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
		$message = "Mật khẩu không chính xác";
		echo "<script type='text/javascript'>alert('$message');</script> Nhấn vào đây để <a href='javascript: history.go(-1)'>Trở lại</a>";	
		exit;
    }
    
    $pwmoi = md5($pwmoi);
    $data = $ngd->capnhatpass($email, $pwmoi);
  
	$message = "Đổi mật khẩu thành công!";
					echo "<script type='text/javascript'>alert('$message');</script> Nhấn vào đây để <a href='index.php'>Quay lại trang chủ</a>";
					exit;

}
?>
