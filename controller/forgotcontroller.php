<?php
if(!isset($_SESSION))
{
    session_start();               
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include './util/pwrand.php';

$action=isset($_GET['action'])?$_GET['action']:'index';
$sp=new sanphammodel();
$ngd = new nguoidungmodel();

if($action=='index')
{
	$data=$sp->all();
	include './view/index.php';
}

if($action=='forgotpass')
{
	include './view/forgotpass.php';
}

if($action=='submit')
{
	$email =$_POST['txt_email'];
    if($ngd->nguoidungcoemail($email)<=0){
		$message = "Tài khoản email không tồn tại";
		echo "<script type='text/javascript'>alert('$message');</script> Nhấn vào đây để <a href='index.php?controller=registercontroller&action=register'>Đăng Ký</a>";	
		exit;
	}
	$maxacthuc = rand_string(7);

    $content = "<b>Mã xác thực của quý khách là: </b><span>".$maxacthuc."</span><br>Không cung cấp mã xác thực cho bất kỳ ai!!!";
    
    $_SESSION["email"]= $email;
    $data = $ngd->capnhatmaxacthuc($email, $maxacthuc);
    

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
    $mail->addAddress($email);     //Add a recipient
    

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Quên mật khẩu tài khoản TH-COFFEE';
    $mail->Body    = $content;
    $mail->AltBody = $content;

    $mail->send();
    //echo 'Gửi email thành công';
	$message = "Chúng tôi đã gửi mã xác thực cho bạn. Vui lòng kiểm tra email !";
					echo "<script type='text/javascript'>alert('$message');</script> Nhấn vào đây để <a href='index.php?controller=xacthuccontroller&action=xacthuc'>Nhập mã xác thực</a>";
					exit;
} catch (Exception $e) {
    echo "Không gửi được email. email lỗi: {$mail->ErrorInfo}";
}


    
}
?>
