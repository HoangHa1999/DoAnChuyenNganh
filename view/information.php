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
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Trang Chủ <i class="fa fa-chevron-right"></i></a></span> <span>Thông Tin Cá Nhân <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Thông Tin Cá Nhân</h2>
          </div>
        </div>
      </div>
    </section>
 		
	<!-- END -->
 
	
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
						<form action="index.php?controller=infocontroller&action=submit" method="POST" class="form-group">
							<h3 class="mb-4 billing-heading">Thông Tin Cá Nhân</h3>
							<?php
              if(isset($alert)){
                echo $alert;
              } else{
              ?>
			  <div class="w-100"></div>
                    <div class="col-md-12">
	                <div class="form-group">
	                	<label for="emailaddress">ID</label>
	                  <input type="text" name="txt_ID" readonly class="form-control" value="<?php echo $nguoidung[0]['id_ngd'] ?>">
	                </div>
                </div>
	          	<div class="w-100"></div>
                    <div class="col-md-12">
	                <div class="form-group">
	                	<label for="emailaddress">Email</label>
	                  <input type="email" name="txt_email" class="form-control" value="<?php echo $nguoidung[0]['email'] ?>">
	                </div>
                </div>
				<div class="w-100"></div>
                    <div class="col-md-12">
	                <div class="form-group">
	                	<label for="emailaddress">Tên người dùng</label>
	                  <input type="text" name="txt_name" class="form-control" value="<?php echo $nguoidung[0]['tennguoidung'] ?>">
	                </div>
                </div>

				<?php if($nguoidung[0]['gioitinh']){ ?>
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
				<?php }else{ ?>
					<div class="w-100"></div>
                    <div class="col-md-12">
	                <div class="form-group">
	                	<label for="emailaddress">Giới tính</label> <br>
						&emsp;&emsp;&emsp;&emsp;&emsp;<label for="html">Nam</label>&ensp;
	                <input type="radio" name="rdi_gioitinh" id="rdi_Nam" value="1"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<label for="html">Nữ</label>&ensp;
	                <input type="radio" name="rdi_gioitinh" id="rdi_Nu" checked value="0">
	                </div>
                </div>
				<?php } ?>
				<div class="w-100"></div>
                    <div class="col-md-12">
	                <div class="form-group">
	                	<label for="emailaddress">Địa chỉ</label>
	                  <input type="text" name="txt_Address" class="form-control" value="<?php echo $nguoidung[0]['diachi'] ?>">
	                </div>
                </div>
		            
		            <div class="w-100"></div>
		            <div class="col-md-12">
	                <div class="form-group">
	                	<label for="phone">Số Điện Thoại</label>
	                  <input type="text" name="txt_Phone" class="form-control" value="<?php echo $nguoidung[0]['sdt'] ?>">
	                </div>              	
            </div>
                <div class="w-100"></div>
                <div class="col-md-12">
					<div class="form-group">
					  <button type="submit" name="btn_capnhat" value="capnhat" class="btn btn-primary"> Cập nhật </button>
					
					    <div class="submitting"></div>
					</div>
					</div>
				<p><a href="index.php?controller=changecontroller&action=changepass"> Đổi mật khẩu</a> </p>
				<?php } ?>
				</form>
				
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