<!DOCTYPE html>
<html lang="en">
  <head>
  		<?php include 'layouts/headerpage.php' ?>
  </head>
  <body>
  <?php include 'layouts/menupage.php' ?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider-02.jpg');" data-stellar-background-ratio="0.5">
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

	
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
						<form action="../controller/dangkycontroller.php" method="POST"  class="billing-form">
							<h3 class="mb-4 billing-heading">Thông Tin Đăng Ký</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="TaiKhoan">Tài Khoản</label>
	                  <input type="text" name="txt_taikhoan" class="form-control" placeholder="Username">
	                </div>
	              </div>
                <div class="col-md-12">
	                <div class="form-group">
	                	<label for="lastname">Mật Khẩu</label>
                        <input type="password"  id="msg_subject" name="txt_password" class="form-control" placeholder="Password" required data-error="Please enter your message subject">
	                </div>
                </div>
                <div class="w-100"></div>
				<div class="col-md-12">
	                <div class="form-group">
	                	<label for="lastname">Nhập lại mật Khẩu</label>
                        <input type="password" id="msg_subject" name="txt_Repassword" class="form-control" placeholder="Re-Password" required data-error="Please enter your message subject">
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Quốc Gia</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="sel_quocgia" class="form-control">
		                  <option disabled selected hidden>Chọn quốc gia</option>
		                  <?php 
		                  $arrayQuocGia = array("Phap"=>"Pháp","Y"=>"Ý","VietNam"=>"Việt Nam","Anh"=>"Anh","NhatBan"=>"Nhật Bản");
		                  foreach ($arrayQuocGia as $key => $value) {
		                  
		    
		                  echo'<option value="'.$key.'">'.$value.'</option>';
		                  
                        }
                            ?>
		                  </select>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
                    <div class="col-md-12">
	                <div class="form-group">
	                	<label for="emailaddress">Email</label>
	                  <input type="email" name="txt_email" class="form-control" placeholder="">
	                </div>
                </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
	                <div class="form-group">
	                	<label for="phone">Số Điện Thoại</label>
	                  <input type="text" name="txt_Phone" class="form-control" placeholder="">
	                </div>
	               	<label for="html">Nam</label>&ensp;
	                <input type="radio" name="rdi_gioitinh" id="rdi_Nam" checked value="Nam"> &emsp;
					<label for="html">Nữ</label>&ensp;
	                <input type="radio" name="rdi_gioitinh"  value="Nữ">
	              </div>

            </div>
          </div>
	          </form>
	          <div>
	              	<form action="../controller/uploadfilecontroller.php" method="POST" enctype="multipart/form-data">Up LoadFile
  				<input type="file" name="file_ToUpload" id="fileToUpload" >
  				<input type="submit" value="Upload Image" name="submit">
				</form>
	              </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                    <div class="form-group">
						<div class="col-md-12">
							<div class="checkbox">
									<label><input type="checkbox" value="1" name="chk_dk" id="chk_dk" class="mr-2"> Tôi đã đọc và chấp nhận điều khoản & điều kiện</label>
							</div>
						</div>
					</div>
	            </div>
                <div class="w-100"></div>
                <div class="col-md-12">
					<div class="form-group">
					  <button type="submit" name="btn_XuLy" value="dangky" class="btn btn-primary"> Đăng Ký </button>
					  <button type="submit" name="btn_XuLy" value="dangnhap" class="btn btn-primary"> Đăng nhập </button> 
					    <div class="submitting"></div>
					</div>
	            </div>
                <div class="w-100"></div>
                <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
              
              <p>Hoặc đăng nhập với:</p>
              <ul class="ftco-footer-social list-unstyled mt-2">
                <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
              </ul>
             

	          </div>
          </div> <!-- .col-md-8 -->
        </div>
    	</div>
    </section>

<?php include '../controller/registerController.php' ?>

    <footer class="ftco-footer">

		<?php include 'layouts/footerpage.php' ?>
    </footer>
    <!-- loader -->
   <?php include "layouts/loaderpage.php" ?>
  </body>
</html>