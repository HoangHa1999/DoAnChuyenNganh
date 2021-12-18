 
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "layouts/headerpage.php" ?>
  </head>
  <body>
    <?php include "layouts/menupage.php" ?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider-02.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span> Tin Tức <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Tin Tức</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container" >
        <div class="row d-flex" style="background-image: url(./images/about-img.jpg);">
        <?php 
            $arrayten =array("Quảng cáo sản phẩm","Chuỗi cà phê được đánh giá");
            $arrayngay =array("September 9,2021","January 5,2021 ");
            $arraybtn = array("Xem chi tiết","Xem chi tiết");
             $arrayhinh =array("image_1.jpg","image_2.jpg");
            for($i =0;$i <count($arrayten);$i++){
           echo '<div class="col-lg-6 d-flex align-items-stretch ftco-animate">';
           echo ' 	<div class="blog-entry d-md-flex">';
           echo ' 		<a href="blog-single.php" class="block-20 img" style="background-image: url(images/'.$arrayhinh[$i].');">';
           echo '      </a>';
           echo '     <div class="text p-4 bg-light">';
           echo '      	<div class="meta">';
           echo '     		<p><span class="fa fa-calendar"></span>'.$arrayngay[$i].' </p>';
           echo '     	</div>';
           echo '        <h3 class="heading mb-3"><a href="#">'.$arrayten[$i].'</a></h3>';
           echo '       <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>';
           echo '       <a href="blog-single.php" class="btn-custom">'.$arraybtn[$i].' <span class="fa fa-long-arrow-right"></span></a>';
           echo '      </div>';
           echo '     </div>';
           echo '   </div>';
          }
          ?>
          
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
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