<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "layouts/headerpage.php" ?>
    <?php include '../util/MySQLUtils.php' ?>
  </head>
  <body>
	<?php include "layouts/menupage.php" ?>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('images/slider-01.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-8 ftco-animate d-flex align-items-end">
          	<div class="text w-100 text-center">
	            <h1 class="mb-4">Good <span>Drink</span> for Good <span>Moments</span>.</h1>
	            <p><a href="product.php" class="btn btn-primary py-2 px-4">Shop Now</a> <a href="about.php" class="btn btn-white btn-outline-white py-2 px-4">Read more</a></p>
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
          	<span class="subheading">Our Delightful offerings</span>
            <h2>Tastefully Yours</h2>
          </div>
        </div>
        	
				<div class="row">
				<?php
				include '../util/TienUtil.php';
             
        $conn= new MySQLUtils();
        $conn->connectDB();
        $sql = "SELECT * FROM sanpham join danhmuc on sanpham.id_danhmuc = danhmuc.id_dm ORDER BY danhmuc.id_dm";
        $result = $conn->selectQuery($sql);  

        foreach($result as $value){
          ?>
					<div class="col-md-3 d-flex">
						<div class="product ftco-animate">
						<div class="img d-flex align-items-center justify-content-center" style="background-image: url(../admin/view/assets//images/faces/<?php echo $value['hinh'] ?>);">
							<div class="desc">
								<p class="meta-prod d-flex">
			
								<a class="d-flex align-items-center justify-content-center" href="product-single.php?id=<?php echo $value['id_sp'] ?>"><span class="flaticon-visibility"></span></a>
									</p>
								</div>
							</div>
							<div class="text text-center">
								<span class="sale">Sale</span>
								<span class="category"><?php echo $value['tendanhmuc'] ?></span>
								<h2><?php echo $value['tensanpham'] ?></h2>
			<p class="mb-0"><span class="price price-sale"><?php echo giagoc($value['gia']) ?></span> <span class="price"><?php echo chuyentien($value['gia']) ?></span></p>
				 <a href="product-single.php?id=<?php echo $value['id_sp'] ?>"><button class="btn btn-primary py-3 px-5 mr-2"> Thêm vào giỏ hàng </button> </a>
							</div>
						</div>
					</div>
      <?php
				}
			?>
					</div>
					
				<div class="row justify-content-center">
					<div class="col-md-4">
						<a href="product.php" class="btn btn-primary d-block">Tất cả sản phẩm <span class="fa fa-long-arrow-right"></span></a>
					</div>
				</div>
			</div>
		</section>
  
    <section class="ftco-section testimony-section img" style="background-image: url(images/about-bg.jpg);">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          	<span class="subheading">Testimonial</span>
            <h2 class="mb-3">Happy Clients</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <?php
              for($i =0;$i <5;$i++){
              echo '<div class="item">';
              echo '      <div class="testimony-wrap py-4">';
              echo '        <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>';
              echo '        <div class="text">';
              echo '          <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>';
              echo '          <div class="d-flex align-items-center">';
              echo '            <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>';
              echo '           <div class="pl-3">';
              echo '              <p class="name">Roger Scott</p>';
              echo '              <span class="position">Marketing Manager</span>';
              echo '            </div>';
              echo '          </div>';
              echo '        </div>';
              echo '      </div>';
              echo '    </div>';
              }
              ?>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


		
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Blog</span>
            <h2>Recent Blog</h2>
          </div>
        </div>
        <div class="row d-flex">
          <?php 
          $arrayten =array("Quảng cáo sản phẩm","Chuỗi cà phê được đánh giá","Lượt bình luận và đánh giá của sản phẩm","Lượt bình luận và đánh giá của sản phẩm");
          $arrayngay =array("September 9,2021","January 5,2021 ","May 6, 2021","May 6, 2021");
          $arraybtn = array("Xem chi tiết","Xem chi tiết","Xem chi tiết","Xem chi tiết");
          $arrayhinh =array("image_1.jpg","image_2.jpg","image_3.jpg","image_4.jpg");
          for($i =0;$i <count($arrayten);$i++){
         echo '<div class="col-lg-6 d-flex align-items-stretch ftco-animate">';
         echo '   <div class="blog-entry d-md-flex">';
         echo '     <a href="blog-single.php" class="block-20 img" style="background-image: url(images/'.$arrayhinh[$i].');">';
         echo '      </a>';
         echo '     <div class="text p-4 bg-light">';
         echo '       <div class="meta">';
         echo '         <p><span class="fa fa-calendar"></span>'.$arrayngay[$i].' </p>';
         echo '       </div>';
         echo '        <h3 class="heading mb-3"><a href="#">'.$arrayten[$i].'</a></h3>';
         echo '       <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>';
         echo '       <a href="blog-single.php" class="btn-custom">'.$arraybtn[$i].' <span class="fa fa-long-arrow-right"></span></a>';
         echo '      </div>';
         echo '     </div>';
         echo '   </div>';
        }
          ?>
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