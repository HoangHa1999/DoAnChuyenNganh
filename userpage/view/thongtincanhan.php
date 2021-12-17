<!DOCTYPE html>
<html lang="en">
  <head>
  		<?php include 'layouts/headerpage.php' ?>
  </head>
  <body>
  <?php include 'layouts/menuthongtin.php' ?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider-02.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="#"> Trang chủ <i class="fa fa-chevron-right"> </i></a> </span> <span> Thông tin cá nhân <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Thông tin cá nhân</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
						<form  method="POST" action="#" class="billing-form">
							<h3 class="mb-4 billing-heading">Thông Tin Cá Nhân</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="TaiKhoan">Tài Khoản</label>

	                  <input type="text" class="form-control" placeholder="doannhom" > 
	                </div>
	              </div>
                <div class="col-md-12">
	                <div class="form-group">
	                	<label for="lastname">Mật Khẩu</label>
                        <input type="password" id="msg_subject" class="form-control" placeholder="******">
	                </div>
                </div>
                
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Quốc Gia</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                <select name="" id="" class="form-control">
		                  	
                          <option value="">  <h1>  Việt Nam <h1></option>
		                  </select> 
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
                    <div class="col-md-12">
	                <div class="form-group">
	                	<label for="emailaddress">Email</label>

	                  <input type="text" class="form-control" placeholder="doan*****@g*****.com">
	                </div>
                </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
	                <div class="form-group">
	                	<label for="phone">Số Điện Thoại</label>
	                  <input type="text" class="form-control" placeholder="0978******">
	                </div>
	               <label for="html">Nam</label>&ensp;
	                <input type="radio" name="rdi_gioitinh" id="rdi_Nam" checked value="Nam"> &emsp;
					<label for="html">Nữ</label>&ensp;
	                <input type="radio" name="rdi_gioitinh"  value="Nữ">
					
	              </div>
	              
                <div class="w-100"></div>
                
                <div class="w-100"></div>
                <div class="col-md-12">
                    <div class="form-group">
					<a href="#"> <button type="submit" class="btn btn-primary">Lưu Thông Tin</button></a>
					    <div class="submitting"></div>
					</div>
	            </div>
                <div class="w-100"></div>
                <div class="col-sm-12 col-md">
            
         
	          </form><!-- END -->


	          </div>
          </div> <!-- .col-md-8 -->
        </div>
    	</div>
    </section>
    <footer class="ftco-footer">
		<?php include 'layouts/footerpage.php' ?>
    </footer>
    <!-- loader -->
   <?php include "layouts/loaderpage.php" ?>
  </body>
</html>