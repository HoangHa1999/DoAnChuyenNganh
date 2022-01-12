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



	if(isset($_GET['action']))
	{
        switch($_GET['action']){
			
			case "submit":
				
						$data=$sp->sptrongcart();
						
						if(!empty($_SESSION["cart"])){
						$tongtien = 0;

						foreach($data as $value)
						{
							$tongtien += $value['gia']*$_SESSION['cart'][$value['id_sp']]; 
						}
						
						$nguoidung = $ngd->nguoidungcoma($_SESSION["idnguoidung"]);

						$email = $nguoidung[0]['email'];
						$tennguoinhan = $_POST['txt_name'];
						$noigiao = $_POST['txt_address'];
						$sdt = $_POST['txt_phone'];					
						$id_dh = $_POST['txt_mdh'];						
						$giogiao = date("H:i:s");			
						$thanhtien =$tongtien - $tongtien*0.1;
						$id_nguoidung = $nguoidung[0]['id_ngd'];
						
						$dhngd =$dh->insert($id_dh, $giogiao, $tennguoinhan, $sdt, $noigiao, $thanhtien,'0','0', $id_nguoidung);
						
						if($dhngd){

						foreach($data as $value)
						{
							$ctdhngd = $ctdh->insert($id_dh, $value['id_sp'], $value['gia'], $_SESSION['cart'][$value['id_sp']]);
						}

						$stt=0;
						$content ="<table width='500' border = '1'>";
						$content .="<tr><th>STT</th><th>Hình</th><th>Sản Phẩm</th><th>Giá Tiền</th><th>Số Lượng</th><th>Tổng Tiền</th></tr>";
						foreach($data as $value)
						{
							$stt++;
							$content .="<tr><td>".$stt.'</td><td><img src="http://thcoffee.xyz/admin/view/assets/images/faces/'.$value['hinh'].'" style="width:50px;height:50px;"></td><td>'.$value['tensanpham']."</td><td>".chuyentien($value['gia'])."</td><td>".$_SESSION['cart'][$value['id_sp']]."</td><td>".chuyentien($value['gia']*$_SESSION['cart'][$value['id_sp']])."</td></tr>";
						}
						$content .="</table>";

						unset($_SESSION['cart']);
						$alert = '<div class="alert alert-success" role="alert"> Đặt hàng thành công! </div>';
						include './view/checkout.php';

	require('mail/PHPMailer/Exception.php');
	require('mail/PHPMailer/SMTP.php');
	require('mail/PHPMailer/PHPMailer.php');

	
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
    $mail->addAddress($email, $tennguoinhan);     //Add a recipient
    $mail->addCC('dh51806426@student.stu.edu.vn', 'admin');

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Đặt hàng thành công';
    $mail->Body    = '<b>Thông tin đặt hàng</b><br><b>Ngày đặt: </b>'.date("d/m/Y").'<br><b>Giờ đặt: </b>'.date("H:i:s").'<br><b>Tên người nhận: </b>'.$tennguoinhan.'<br><b>Địa chỉ: </b>'.$noigiao.'<br><b>SĐT: </b>'.$sdt.$content.'<span><b>Thành tiền (giảm giá 10%): </b></span><span>'.chuyentien($tongtien-$tongtien*0.1).'</span><br><b>Cảm ơn bạn đã mua hàng</b>';
    

    $mail->send();

} catch (Exception $e) {
    echo "Không gửi được email. email lỗi: {$mail->ErrorInfo}";
}
exit;
						}else{
							$alert = '<div class="alert alert-danger" role="alert"> Đặt hàng thất bại! </div>';
							include './view/cart.php';
							exit;
						}
					}	
			
		
				
				break;
		}
        
	}
    
    








?>