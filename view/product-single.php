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
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span><a href="index.php?controller=sanphamcontroller&action=product">Sản phẩm <i class="fa fa-chevron-right"></i></a></span> <span>Chi tiết sản phẩm<i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Chi tiết sản phẩm</h2>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="admin/view/assets/images/faces/<?php  echo $data[0]['hinh']?>" class="image-popup prod-img-bg"><img src="admin/view/assets/images/faces/<?php  echo $data[0]['hinh']?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $data[0]['tensanpham']?></h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="fa fa-star"></span></a>
								<a href="#"><span class="fa fa-star"></span></a>
								<a href="#"><span class="fa fa-star"></span></a>
								<a href="#"><span class="fa fa-star"></span></a>
								<a href="#"><span class="fa fa-star"></span></a>
							</p>
							
						</div>
						
    					 <p class="price">
							<?php
							include 'util/TienUtil.php';
    					 	echo '<span>';
    					 		echo chuyentien($data[0]['gia']); 
    					 	echo '</span>';
    					 	?>
    					 </p>
    					
    				
						</p>
		<form class="form form-horizontal"  method = "POST" action = "index.php?controller=cartcontroller&action=add">
						<div class="row mt-4">
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="fa fa-minus"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" readonly name="quantity[<?php echo $id_sp ?>]" class="quantity form-control input-number" value="1" min="1" max="100">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="fa fa-plus"></i>
	                 </button>
	             	</span>
	          	</div>
    			</div>
				<button type="submit" value="themsp" class="btn btn-primary"> Thêm vào giỏ hàng </button>
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