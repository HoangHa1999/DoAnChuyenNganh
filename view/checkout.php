<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "view/layouts/headerpage.php" ?>
  </head>
  <body>
  	<?php include "view/layouts/menupage.php" ?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('view/images/slider-02.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span>Thanh toán <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Thanh toán</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
						<form  action="index.php?controller=paymentcontroller&action=submit" method="POST" class="form-group">
							<h3 class="mb-4 billing-heading">Thông tin thanh toán </h3><?php
              if(isset($alert)){
                echo $alert;
              }else{
              ?>
			  	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Mã đơn hàng</label>
	                  <input type="text" name="txt_mdh" class="form-control" readonly value = "<?php echo $id_dh ?>">
	                </div>
	              </div>
	          	
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Tên người nhận</label>
	                  <input type="text" name="txt_name" class="form-control" value = "<?php echo $tennguoinhan ?>">
	                </div>
	              </div>
               
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress">Địa chỉ</label>
	                  <input type="text" name="txt_address" class="form-control" value = "<?php echo $noigiao ?>">
	                </div>
		            </div>
		           
		            <div class="w-100"></div>
		            <div class="col-md-12">
	                <div class="form-group">
	                	<label for="phone">Số điện thoại</label>
	                  <input type="text" name="txt_phone" class="form-control" value = "<?php echo $sdt ?>">
	                </div>
	              </div>
	             
	            </div>
	         <!-- END -->



	          <div class="row justify-content-end">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Tổng kết</h3>
    					<?php
						  	
    						echo '<p class="d-flex">';
    						echo '	<span>Tổng tiền</span>';
    						echo '	<span>'.chuyentien($tongtien).'</span>';
    						echo '</p>';

							echo '<p class="d-flex">';
    						echo '	<span>Giảm giá</span>';
    						echo '	<span>10%</span>';
    						echo '</p>';
    						
    						echo '<hr>';
    						echo '<p class="d-flex total-price">';
    						echo '	<span>Thành tiền</span>';
    						echo '	<span>'.chuyentien($tongtien-$tongtien*0.1).'</span>';
    						echo '</p>';
						?>
    				</div>
    				<button type="submit" name="btndathang" value="dathang" class="btn btn-primary"> Đặt Hàng </button>
    			</div>
				<?php
			  }
				?>
				</form>
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