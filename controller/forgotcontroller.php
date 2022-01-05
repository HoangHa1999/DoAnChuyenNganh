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
        $alert = '<div class="alert alert-danger" role="alert"> Tài khoản email không tồn tại! </div>';
		include './view/forgotpass.php';
		exit;
	}
	$maxacthuc = rand_string(7);

    $content = "<b>Mã xác thực của quý khách là: </b><span>".$maxacthuc."</span><br>Không cung cấp mã xác thực cho bất kỳ ai!!!";
    
    $_SESSION["email"]= $email;
    $data = $ngd->capnhatmaxacthuc($email, $maxacthuc);
    
    if($data)
	{
		$alert = '<div class="alert alert-primary" role="alert"> Chúng tôi đã gửi mã xác thực cho bạn. Vui lòng kiểm tra email! </div>';
		include './view/xacthuc.php';
		
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
					
} catch (Exception $e) {
    echo "Không gửi được email. email lỗi: {$mail->ErrorInfo}";
}
exit;
}else{
    $alert = '<div class="alert alert-danger" role="alert"> Gửi thất bại! </div>';
    include './view/forgotpass.php';
    exit;
}

    
}
?>
