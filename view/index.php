<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "view/layouts/headerpage.php" ?>
    
  </head>
  <body>
	<?php include "view/layouts/menupage.php" ?>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('view/images/slider-01.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-8 ftco-animate d-flex align-items-end">
          	<div class="text w-100 text-center">
	            <h1 class="mb-4">Good <span>Drink</span> for Good <span>Moments</span>.</h1>
	            <p><a href="index.php?controller=sanphamcontroller&action=product" class="btn btn-primary py-2 px-4">Mua Ngay</a> <a href="index.php?controller=aboutcontroller&action=about" class="btn btn-white btn-outline-white py-2 px-4">Đọc thêm</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include "layouts/containerpage.php" ?>
    

		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center pb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">TH - Coffee</span>
            <h2>Sản Phẩm Nổi Bật</h2>
          </div>
        </div>
        	
				<div class="row">
				<?php
				include 'util/TienUtil.php';
             
       
        

        foreach($data as $value){
          ?>
					<div class="col-md-3 d-flex">
						<div class="product ftco-animate">
						<div class="img d-flex align-items-center justify-content-center" style="background-image: url(admin/view/assets/images/faces/<?php echo $value['hinh'] ?>);">
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
				 <a href="index.php?controller=sanphamcontroller&action=productdetail&id=<?php echo $value['id_sp'] ?>"><button class="btn btn-primary py-3 px-5 mr-2"> Thêm vào giỏ hàng </button> </a>
							</div>
						</div>
					</div>
      <?php
				}
			?>
					</div>
					
				<div class="row justify-content-center">
					<div class="col-md-4">
						<a href="index.php?controller=sanphamcontroller&action=product" class="btn btn-primary d-block">Tất cả sản phẩm <span class="fa fa-long-arrow-right"></span></a>
					</div>
				</div>
			</div>
		</section>
  
    


		
    <section class="ftco-section testimony-section img" style="background-image: url(view/images/about-bg.jpg);">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Tin Tức</span>
            <h2>Tin Tức Nổi Bật</h2>
          </div>
        </div>
        <div class="row d-flex">
          <?php 
          $arrayten =array("Truyền thuyết về quả cà phê","Th - Coffee địa điểm check in của giới trẻ","Top 10 quán cafe dành cho cặp đôi");
          $arrayblog =array("Có rất nhiều truyền thuyết về nguồn gốc của cà phê. Tuy nhiên, câu chuyện người đàn ông chăn dê tên Kaldi phát hiện ra cây cà phê ở khu rừng cổ của cao nguyên Ethiopia là phổ biến và được nhiều người tin nhất. ","TH - Coffee một trong những địa điểm check in đáng để thử dành cho giới trẻ với những góc view bắt mắt,....","Những quán cafe có view đẹp góc chụp hình sang chảnh, lãng mạn dành cho các cặp đôi đi chơi check in vào mùa noel,...");
          $arrayngay =array("Tháng 12,2022","Tháng 9,2021","Tháng 5,2018 ");
          
          $arrayhinh =array("blog1.jpg","image_1.jpg","image_2.jpg");
          for($i =0;$i <count($arrayten);$i++){
         echo '<div class="col-lg-6 d-flex align-items-stretch ftco-animate">';
         echo '   <div class="blog-entry d-md-flex">';
         echo '     <a href="#" class="block-20 img" style="background-image: url(view/images/'.$arrayhinh[$i].');">';
         echo '      </a>';
         echo '     <div class="text p-4 bg-light">';
         echo '       <div class="meta">';
         echo '         <p><span class="fa fa-calendar"></span>'.$arrayngay[$i].' </p>';
         echo '       </div>';
         echo '        <h3 class="heading mb-3"><a href="#">'.$arrayten[$i].'</a></h3>';
         echo '       <p>'.$arrayblog[$i].'</p>';
         echo '       <a href="#" class="btn-custom"> Xem chi tiết <span class="fa fa-long-arrow-right"></span></a>';
         echo '      </div>';
         echo '     </div>';
         echo '   </div>';
        }
          ?>
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