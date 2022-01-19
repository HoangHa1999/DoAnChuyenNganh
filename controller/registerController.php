<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$action=isset($_GET['action'])?$_GET['action']:'index';
$sp=new sanphammodel();
$ngd=new nguoidungmodel();

if($action=='index')
{
	$data=$sp->all();
	include './view/index.php';
}

if($action=='register')
{
    include './view/register.php';
}

if($action=='submit')
{
	$id_ngd = "ngd".rand(10,99);
	$email =$_POST['txt_email'];
	$ten = $_POST['txt_name'];
	$gt = $_POST['rdi_gioitinh'];
	$pw = md5($_POST['txt_password']);
	$diachi = $_POST['txt_Address'];
	$sdt = $_POST['txt_Phone'];

	
	
	if($ngd->nguoidungcoemail($email)>0){
		$alert = '<center><div class="alert alert-danger" role="alert"> Tài khoản email đã tồn tại. </div></center>';
		include './view/register.php';
		exit;
	}
		
	$data = $ngd->insert($id_ngd, $ten, $gt, $email, $pw, $sdt, $diachi);
	
	if($data)
	{
		$alert = '<center><div class="alert alert-success" role="alert"> Đăng ký tài khoản thành công. </div></center>';
		include './view/register.php';

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
    $mail->addAddress($email, $ten);     //Add a recipient
    

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Đăng ký tài khoản TH-COFFEE thành công';
    $mail->Body    = '<b>Username: </b>'.$email.'<br><b>Password: </b>'.$_POST['txt_password'];
    $mail->AltBody = '<b>Username: </b>'.$email.'<br><b>Password: </b>'.$_POST['txt_password'];

    $mail->send();
    //echo 'Gửi email thành công';

} catch (Exception $e) {
    echo "Không gửi được email. email lỗi: {$mail->ErrorInfo}";
}

		exit;
	}else{
		$alert = '<center><div class="alert alert-danger" role="alert"> Đăng ký tài khoản thất bại. </div></center>';
		include './view/register.php';
		exit;
	}

}




?>