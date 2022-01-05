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
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Trang Chủ <i class="fa fa-chevron-right"></i></a></span> <span>Quên Mật Khẩu <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Quên Mật Khẩu</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
						<form  action="index.php?controller=forgotcontroller&action=submit" method="POST" class="billing-form">
							<h3 class="mb-4 billing-heading">Quên Mật Khẩu</h3>
              <?php
              if(isset($alert)){
                echo $alert;
              }
              ?>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="emailaddress">Email</label>
	                  <input type="email" name="txt_email" class="form-control" placeholder="Email" required="required">
	                </div>
	              </div>
                
	            </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                    <div class="form-group">
					<button type="submit" name ="btngui" class="btn btn-primary">Gửi mã xác thực</button>
					    <div class="submitting"></div>
					</div>
	            </div>
              
               
	          </form><!-- END -->


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
