 
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "view/layouts/headerpage.php" ?>
  </head>
  <body>
    <?php include "layouts/menupage.php" ?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('view/images/slider-02.jpg');" data-stellar-background-ratio="0.5">
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
            $arrayten =array("Thái Nguyên - Đệ Nhất Danh Trà ","Thời Điểm Vàng Để Uống Cà Phê");
            $arrayngay =array("September 9,2021","January 5,2021 ");
            $arraymota =array("Nhắc đến trà đầu tiên phải nhắc đến vùng đất Thái Nguyên. Nơi đây nổi tiếng với những nương trà xanh mát, bao la và bất tận,...","Nhiều nghiên cứu đã chỉ ra rằng việc uống cà phê thường xuyên sẽ rất có lợi cho cơ thể. Nó giúp bạn giảm nguy cơ mắc các bệnh nguy hiểm như: Alzheimer, Parkinson,...");
            $arraybtn = array("Xem chi tiết","Xem chi tiết");
            $arraychitiet = array("index.php?controller=blogcontroller&action=blogdetail","index.php?controller=blogcontroller&action=blogdetail1");
            $arrayhinh =array("image_tra.jpg","image_phacaphe.jpg");
            for($i =0;$i <count($arrayten);$i++){
           echo '<div class="col-lg-6 d-flex align-items-stretch ftco-animate">';
           echo '   <div class="blog-entry d-md-flex">';
           echo '     <div class="block-20 img" style="background-image: url(view/images/'.$arrayhinh[$i].');">';
           echo '      </div>';
           echo '     <div class="text p-4 bg-light">';
           echo '       <div class="meta">';
           echo '         <p><span class="fa fa-calendar"></span>'.$arrayngay[$i].' </p>';
           echo '       </div>';
           echo '        <h3 class="heading mb-3">'.$arrayten[$i].'</h3>';
           echo '       <p>'.$arraymota[$i].'</p>';
           echo '       <a href="'.$arraychitiet[$i].'" class="btn-custom">'.$arraybtn[$i].' <span class="fa fa-long-arrow-right"></span></a>';
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