<?php
if(!isset($_SESSION))
{
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

if($action=='information')
{
	$nguoidung = $ngd->nguoidungcoma($_SESSION["idnguoidung"]);
    include './view/information.php';
}

if($action=='submit')
{
	$id_ngd = $_POST['txt_ID'];
	$email =$_POST['txt_email'];
	$ten = $_POST['txt_name'];
	$gt = $_POST['rdi_gioitinh'];
	$diachi = $_POST['txt_Address'];
	$sdt = $_POST['txt_Phone'];

		
	$data = $ngd->capnhatthongtin($id_ngd, $email, $ten, $gt, $diachi, $sdt);
	
	if($data)
	{
		$alert = '<div class="alert alert-success" role="alert"> Cập nhật thông tin thành công. </div>';
		include './view/information.php';
		exit;
	}else{
		$alert = '<div class="alert alert-danger" role="alert"> Cập nhật thông tin thất bại. </div>';
		include './view/information.php';
		exit;
	}

}




?>