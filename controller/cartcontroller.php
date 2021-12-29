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
						if(isset($_SESSION["idnguoidung"]))
	{
						$tongtien = 0;
						$data=$sp->sptrongcart();
						
						
						foreach($data as $value)
						{
							$tongtien += $value['gia']*$_POST['quantity'][$value['id_sp']]; 
						}
						
						
						$nguoidung = $ngd->nguoidungcoma($_SESSION["idnguoidung"]);						
						$id_dh = "dh".rand(10,99);						
						$giogiao = date("H:i:s");			
						$noigiao = $nguoidung[0]['diachi'];
						$thanhtien =$tongtien - $tongtien*0.1;
						$id_nguoidung = $nguoidung[0]['id_ngd'];
						
						$dhngd =$dh->insert($id_dh, $giogiao, $noigiao, $thanhtien,'0','0', $id_nguoidung);
						
						foreach($data as $value)
						{
							$ctdhngd = $ctdh->insert($id_dh, $value['id_sp'], $value['gia'], $_POST['quantity'][$value['id_sp']]);
						}

						$stt=0;
						$content ="<table width='500' border = '1'>";
						$content .="<tr><th>STT</th><th>Sản Phẩm</th><th>Giá Tiền</th><th>Số Lượng</th><th>Tổng Tiền</th></tr>";
						foreach($data as $value)
						{
							$stt++;
							$content .="<tr><td>".$stt."</td><td>".$value['tensanpham']."</td><td>".chuyentien($value['gia'])."</td><td>".$_POST['quantity'][$value['id_sp']]."</td><td>".chuyentien($value['gia']*$_POST['quantity'][$value['id_sp']])."</td></tr>";
						}
						$content .="</table>";
				
					
	
	require('mail/PHPMailer/Exception.php');
	require('mail/PHPMailer/SMTP.php');
	require('mail/PHPMailer/PHPMailer.php');

	$nguoidung = $ngd->nguoidungcoma($_SESSION["idnguoidung"]);
	$email = $nguoidung[0]['email'];
	$ten = $nguoidung[0]['tennguoidung'];
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
	$mail->CharSet = "UTF-8";
    //Server settings
                       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ngocha1999.hh@gmail.com';                     //SMTP username
    $mail->Password   = 'bvokmozkvanxpeti';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ngocha1999.hh@gmail.com', 'TH COFFEE');
    $mail->addAddress($email, $ten);     //Add a recipient
    $mail->addCC('dh51806426@student.stu.edu.vn', 'admin');

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Đặt hàng thành công';
    $mail->Body    = '<b>Thông tin đặt hàng</b>'.$content.'<span><b>Thành tiền (giảm giá 10%): </b></span><span>'.chuyentien($tongtien-$tongtien*0.1).'</span><br><b>Cảm ơn bạn đã mua hàng</b>';
    

    $mail->send();
	unset($_SESSION['cart']);
    echo 'Mã thanh toán Momo';
	?>
					<img  src="view/images/qrcode.jpg" style="width:550px;height:500px;" >
					<?php
					$message = "Đặt hàng thành công.";
					echo "<script type='text/javascript'>alert('$message');</script> Nhấn vào đây để <a href='index.php'>Tiếp tục mua hàng</a>";
					exit;
} catch (Exception $e) {
    echo "Không gửi được email. email lỗi: {$mail->ErrorInfo}";
}

					
				}else{
					$message = "Bạn chưa đăng nhập. Vui lòng đăng nhập để đặt hàng!";
					echo "<script type='text/javascript'>alert('$message');</script> Nhấn vào đây để <a href='javascript: history.go(-1)'>Trở lại</a>";
					exit;
				}
			}
		}
				
				break;
		}
        
	}
    
    








?>