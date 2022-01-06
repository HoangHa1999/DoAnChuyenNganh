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
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Trang chủ<i class="fa fa-chevron-right"></i></a></span> <span>Danh sách sản phẩm <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Danh sách sản phẩm</h2>
          </div>
        </div>
      </div>
    </section>

	
    <section class="ftco-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row mb-4">
							<div class="col-md-12 d-flex justify-content-between align-items-center">
								<h4 class="product-select">Chọn loại sản phẩm</h4>
								<select class="form-select" aria-label="Default select example" onchange="location = this.value;">
								<option  disabled selected hidden>---  Chọn Danh Mục  ---</option>'
								<?php
                                                           
                                                            foreach($datadm as $value)
                                                            {
                                                                echo '<option value="index.php?controller=sanphamcontroller&action=product&id='.$value['id_dm'].'">'.$value['tendanhmuc'].'</option>';
                                                            }
                                                            ?>  
                                                            </select>
							</div>
						</div>
						<div class="row">
						
							<?php
				include 'util/TienUtil.php';
				foreach($data as $value){
					?>  
							  <div class="col-md-3 d-flex">
								  <div class="product ftco-animate">
								  <div class="img d-flex align-items-center justify-content-center" style="background-image: url(admin/view/assets//images/faces/<?php echo $value['hinh'] ?>);">
									  <div class="desc">
										  <p class="meta-prod d-flex">
					  
										  <a class="d-flex align-items-center justify-content-center" href="index.php?controller=sanphamcontroller&action=productdetail&id=<?php echo $value['id_sp'] ?>"><span class="flaticon-visibility"></span></a>
											  </p>
										  </div>
									  </div>
									  <div class="text text-center">
										  <span class="sale">Sale</span>
										  <span class="category"><?php echo $value['tendanhmuc'] ?></span>
										  <h2><?php echo $value['tensanpham'] ?></h2>
					  <p class="mb-0"><span class="price price-sale"><?php echo giagoc($value['gia']) ?></span> <span class="price"><?php echo chuyentien($value['gia']) ?></span></p>
						   
									  </div>
								  </div>
							  </div>
						<?php
						}
						?>
						</div>
										
					</div>

					
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