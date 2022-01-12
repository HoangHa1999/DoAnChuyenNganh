<?php
if(!isset($_SESSION))
{
    session_start();               
}
include 'util/TienUtil.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$action=isset($_GET['action'])?$_GET['action']:'index';
$sp=new sanphammodel();
$dm=new danhmucmodel();
$ngd = new nguoidungmodel();
$dh = new donhangmodel();
$ctdh = new chitietdonhangmodel();

if($action=='index')
{
	$data=$sp->all();
	include './view/index.php';
}
if($action=='cart')
{
	$data=$sp->sptrongcart();
	include './view/cart.php';
}




if(!isset($_SESSION["cart"]))
	{
		$_SESSION["cart"] =array();           
	}
	if(isset($_GET['action']))
	{
		function update_cart($add = false)
		{
			foreach ($_POST['quantity'] as $id => $quantity){
				if($quantity == 0){
					unset($_SESSION['cart'][$id]);
				}else{
				if($add) {
					$_SESSION['cart'][$id] += $quantity;
				}else{
					$_SESSION['cart'][$id] = $quantity;
				}
			}
		}
        }
        switch($_GET['action']){
			case "add":
				$tongtien = 0;
				update_cart(true);
				header('location: index.php?controller=cartcontroller&action=cart');

				break;

			case "delete":
				if(isset($_GET['id']))
				{
					unset($_SESSION['cart'][$_GET['id']]);
				}
				header('location: index.php?controller=cartcontroller&action=cart');
				break;
			case "submit":
				if(isset($_POST['btncapnhat']))
				{
					$tongtien = 0;
					update_cart();
					header('location: index.php?controller=cartcontroller&action=cart');

				}else if(isset($_POST['btnthanhtoan'])){

					if(!empty($_POST['quantity'])){
						$data=$sp->sptrongcart();
						if(isset($_SESSION["idnguoidung"]))
						{
						if(!empty($_SESSION["cart"])){
						$tongtien = 0;

						foreach($data as $value)
						{
							$tongtien += $value['gia']*$_POST['quantity'][$value['id_sp']]; 
						}
						
						$nguoidung = $ngd->nguoidungcoma($_SESSION["idnguoidung"]);
						$tennguoinhan = $nguoidung[0]['tennguoidung'];
						$sdt = $nguoidung[0]['sdt'];						
						$id_dh = "dh".rand(10,99999);						
						$giogiao = date("H:i:s");			
						$noigiao = $nguoidung[0]['diachi'];
						$thanhtien =$tongtien - $tongtien*0.1;
						$id_nguoidung = $nguoidung[0]['id_ngd'];
						include './view/checkout.php';
						exit;
					}
						
				}else{
					$alert = '<div class="alert alert-danger" role="alert"> Bạn chưa đăng nhập. Vui lòng đăng nhập để đặt hàng! </div>';
					include './view/cart.php';
					exit;
				}
			}
		}
				
				break;
		}
        
	}
    
    








?>