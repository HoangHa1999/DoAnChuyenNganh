<!DOCTYPE html>
<html lang="en">
  <head>
  		<?php include 'view/layouts/headerpage.php' ?>
  </head>
  <body>
  <?php include 'view/layouts/menupage.php' ?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('view/images/slider-02.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Trang Chủ <i class="fa fa-chevron-right"></i></a></span> <span>Đăng Ký <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Đăng Ký</h2>
          </div>
        </div>
      </div>
    </section>
 		
	<!-- END -->

	<script type="text/javascript">  
function matchpass(){  
var firstpassword=document.f1.txt_password.value;  
var secondpassword=document.f1.txt_Repassword.value;  
  
if(firstpassword==secondpassword){  
return true;  
}  
else{  
alert("Mật khẩu không giống nhau. Vui lòng kiểm tra lại!");  
return false;  
}  
}  
</script>  
	
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
						<form name="f1" action="index.php?controller=registercontroller&action=submit" method="POST" onsubmit="return matchpass()" class="form-group">
							<h3 class="mb-4 billing-heading">Thông Tin Đăng Ký</h3>
							<?php
              if(isset($alert)){
                echo $alert;
              }
              ?>
	          	<div class="w-100"></div>
                    <div class="col-md-12">
	                <div class="form-group">
	                	<label for="emailaddress">Email</label>
	                  <input type="email" name="txt_email" class="form-control" placeholder="" required="required">
	                </div>
                </div>
				<div class="w-100"></div>
                    <div class="col-md-12">
	                <div class="form-group">
	                	<label for="emailaddress">Tên người dùng</label>
	                  <input type="text" name="txt_name" class="form-control" placeholder="" required="required">
	                </div>
                </div>

				<div class="w-100"></div>
                    <div class="col-md-12">
	                <div class="form-group">
	                	<label for="emailaddress">Giới tính</label> <br>
						&emsp;&emsp;&emsp;&emsp;&emsp;<label for="html">Nam</label>&ensp;
	                <input type="radio" name="rdi_gioitinh" id="rdi_Nam" checked value="1"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<label for="html">Nữ</label>&ensp;
	                <input type="radio" name="rdi_gioitinh" id="rdi_Nu" value="0">
	                </div>
                </div>

                <div class="col-md-12">
	                <div class="form-group">
	                	<label for="lastname">Mật Khẩu</label>
                        <input type="password" id="txt_password" name="txt_password" class="form-control" placeholder="Password" required data-error="Vui lòng nhập mật khẩu của bạn">
	                </div>
                </div>
                <div class="w-100"></div>
				<div class="col-md-12">
	                <div class="form-group">
	                	<label for="lastname">Nhập lại mật Khẩu</label>
                        <input type="password" id="txt_Repassword" name="txt_Repassword" class="form-control" placeholder="Re-Password" required data-error="Vui lòng nhập mật khẩu của bạn">
	                </div>
                </div>
				
				<div class="w-100"></div>
                    <div class="col-md-12">
	                <div class="form-group">
	                	<label for="emailaddress">Địa chỉ</label>
	                  <input type="text" name="txt_Address" class="form-control" placeholder="" required="required">
	                </div>
                </div>
		            
		            <div class="w-100"></div>
		            <div class="col-md-12">
	                <div class="form-group">
	                	<label for="phone">Số Điện Thoại</label>
	                  <input type="text" name="txt_Phone" class="form-control" placeholder="" required="required">
	                </div>
	               	
	              </div>

            </div>
          </div>
		  
	         
                <div class="w-100"></div>
                <div class="col-md-12">
                    <div class="form-group">
						<div class="col-md-12">
							<div class="checkbox">
									<label><input type="checkbox" value="1" name="chk_dk" id="chk_dk" required class="mr-2"> Tôi đã đọc và chấp nhận điều khoản & điều kiện</label>
							</div>
						</div>
					</div>
	            </div>

                <div class="w-100"></div>
                <div class="col-md-12">
					<div class="form-group">
					  <button type="submit" name="btn_dangky" value="dangky" class="btn btn-primary"> Đăng Ký </button>
					
					    <div class="submitting"></div>
					</div>
	            </div>
				</form>
				<div class="w-100"></div>
                <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
              
              <p>Đã có tài khoản nhấn: <a href="index.php?controller=logincontroller&action=login"> Đăng Nhập </a></p>
				
                <div class="w-100"></div>
                <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
             
             

	          </div>
          </div> <!-- .col-md-8 -->
        </div>
    	</div>
    </section>



    <footer class="ftco-footer">

		<?php include 'view/layouts/footerpage.php' ?>
    </footer>
    <!-- loader -->
   <?php include "view/layouts/loaderpage.php" ?>
  </body>
</html>