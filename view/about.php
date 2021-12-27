<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "view/layouts/headerpage.php"?>
  </head>
  <body>
    <?php include "view/layouts/menupage.php"?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('view/images/slider-02.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span>Về chúng tôi <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Về chúng tôi</h2>
          </div>
        </div>
      </div>
    </section>

    <?php include "view/layouts/containerpage.php"?>

  
    <section class="ftco-section testimony-section img" style="background-image: url(view/images/about-bg.jpg);">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          	<span class="subheading">Đánh Giá</span>
            <h2 class="mb-3">Đánh Giá Nổi Bật</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
            <?php
            for($i =1;$i <5;$i++){
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
          </div>
        </div>
      </div>
    </section>


		<section class="ftco-counter ftco-section ftco-no-pt ftco-no-pb img bg-light" id="section-counter">
    	<div class="container">
    		<div class="row">
          <?php
          $arraydatanumber = array("3000","115","100","40");
          $arrayname = array("Our Satisfied Customers","Years of Experience","Kinds of Liquor","Our Branches");
          for($i =0;$i <count($arrayname);$i++){
          echo '<div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">';
          echo '  <div class="block-18 py-4 mb-4">';
          echo '    <div class="text align-items-center">';
          echo '      <strong class="number" data-number="'.$arraydatanumber[$i].'">0</strong>';
          echo '      <span>'.$arrayname[$i].'</span>';
          echo '    </div>';
          echo '  </div>';
          echo '</div>';
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