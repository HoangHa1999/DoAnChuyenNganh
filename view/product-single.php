<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "layouts/headerpage.php" ?>
	<?php include '../util/MySQLUtils.php' ?>
  </head>
  <body>
  	<?php include "layouts/menupage.php" ?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider-02.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span><a href="product.php">Products <i class="fa fa-chevron-right"></i></a></span> <span>Chi tiết sản phẩm<i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Products Single</h2>
          </div>
        </div>
      </div>
    </section>

	<?php
                                        
        $conn= new MySQLUtils();
        $conn->connectDB();

        if(isset($_GET["id"]))
        {                               
            $id_sp = $_GET["id"];
            $sql = "SELECT * FROM sanpham WHERE id_sp = '$id_sp'";
            $result = $conn->selectQuery($sql);                           
        }
	?>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="images/prod-1.jpg" class="image-popup prod-img-bg"><img src="../admin/view/assets/images/faces/<?php  echo $result[0]['hinh']?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $result[0]['tensanpham']?></h3>
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
							include '../util/TienUtil.php';
    					 	echo '<span>';
    					 		echo chuyentien($result[0]['gia']); 
    					 	echo '</span>';
    					 	?>
    					 </p>
    					
    				
						</p>
		<form class="form form-horizontal"  method = "POST" action = "cart.php?action=add">
						<div class="row mt-4">
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="fa fa-minus"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity[<?php echo $id_sp ?>]" class="quantity form-control input-number" value="1" min="1" max="100">
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




    		<div class="row mt-5">
          <div class="col-md-12 nav-link-wrap">
            <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>

              <a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Manufacturer</a>

              <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Reviews</a>

            </div>
          </div>
          <div class="col-md-12 tab-wrap">
            
            <div class="tab-content bg-light" id="v-pills-tabContent">

              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
              	<div class="p-4">
	              	<h3 class="mb-4">Trà Phúc Bồn Tử</h3>
	              	<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
              	</div>
              </div>

              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
              	<div class="p-4">
	              	<h3 class="mb-4">Được sản xuất bởi TH - Coffee</h3>
	              	<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
              	</div>
              </div>
              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
              	<div class="row p-4">
						   		<div class="col-md-7">
						   			<h3 class="mb-4">Reviews</h3>
						   			<?php
						   			for($i =0;$i <3;$i++){
						   			echo '<div class="review">';
								   	echo '	<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>';
								   	echo '	<div class="desc">';
								   	echo '		<h4>';
								   	echo '			<span class="text-left">Jacob Webb</span>';
								   	echo '			<span class="text-right">25 April 2020</span>';
								   	echo '		</h4>';
								   	echo '		<p class="star">';
								   	echo '			<span>';
								   	echo '				<i class="fa fa-star"></i>';
								   	echo '				<i class="fa fa-star"></i>';
								   	echo '				<i class="fa fa-star"></i>';
								   	echo '				<i class="fa fa-star"></i>';
								   	echo '				<i class="fa fa-star"></i>';
							   		echo '			</span>';
							   		echo '			<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>';
								   	echo '		</p>';
								   	echo '		<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>';
								   	echo '	</div>';
								   	echo '</div>';
								   	}
								   	?>
						   		</div>
						   		<div class="col-md-4">
						   			<div class="rating-wrap">
							   			<h3 class="mb-4">Give a Review</h3>
							   			<?php
							   			$arraydanhgia = array("10 đánh giá","20 đánh giá","30 đánh giá","40 đánh giá","50 đánh giá");
							   			$arrayphantram = array("99%","80%","65%","5%","0%");
							   			for($i =0;$i <5;$i++){
							   			echo '<p class="star">';
							   				echo '	<span>';
							   				for($j =$i;$j <5;$j++){
							   				echo '		<i class="fa fa-star"></i>';
						   					}

							   				echo ' '.$arrayphantram[$i];
						   					echo '	</span>';
						   				echo '	<span>'.$arraydanhgia[$i].'</span>';
							   			echo '</p>';
							   			}
							   			?>
							   		</div>
						   		</div>
						   	</div>
              </div>
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