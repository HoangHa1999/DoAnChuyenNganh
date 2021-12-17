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
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Trang chủ<i class="fa fa-chevron-right"></i></a></span> <span>Danh sách sản phẩm <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Danh sách sản phẩm</h2>
          </div>
        </div>
      </div>
    </section>

	<?php
	$conn= new MySQLUtils();
	$conn->connectDB();
	?>
    <section class="ftco-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row mb-4">
							<div class="col-md-12 d-flex justify-content-between align-items-center">
								<h4 class="product-select">Chọn loại sản phẩm</h4>
								<select class="form-select" aria-label="Default select example" name="id_dm" id="id_dm" onchange="location = this.value;">
								<option >--- Chọn Danh Mục ---</option>'
                                                            <?php
                                                            $sql = "SELECT * FROM danhmuc";
                                                            $result = $conn->selectQuery($sql);

                                                            foreach($result as $value)
                                                            {
                                                                echo '<option value="product.php?id='.$value['id_dm'].'">'.$value['tendanhmuc'].'</option>';
                                                            }
                                                            ?>  
                                                            </select>
							</div>
						</div>
						<div class="row" style="width:1150px; ">
						
							<?php
				include '../util/TienUtil.php';
				
				$sql = "SELECT * FROM sanpham join danhmuc on sanpham.id_danhmuc = danhmuc.id_dm";
				if(isset($_GET["id"]))
				{
					$id_dm = $_GET["id"];
					$sql = "SELECT * FROM sanpham join danhmuc on sanpham.id_danhmuc = danhmuc.id_dm WHERE sanpham.id_danhmuc = '$id_dm'";
				}
				$result = $conn->selectQuery($sql);  
		
				foreach($result as $value){
					echo'	<div class="col-md-3 d-flex">';
					echo'		<div class="product ftco-animate">';
					echo'		<div class="img d-flex align-items-center justify-content-center" style="background-image: url(../../admin/view/assets//images/faces/'.$value['hinh'].');">';
					echo'			<div class="desc">';
					echo'				<p class="meta-prod d-flex">';
				
					echo'				<a class="d-flex align-items-center justify-content-center" href="product-single.php?id='.$value['id_sp'].'"><span class="flaticon-visibility"></span></a>';
					echo'					</p>';
					echo'				</div>';
					echo'			</div>';
					echo'			<div class="text text-center">';
					echo'				<span class="sale">Sale</span>';
					echo'				<span class="category">'.$value['tendanhmuc'].'</span>';
					echo'				<h2>'.$value['tensanpham'].'</h2>';
				echo'<p class="mb-0"><span class="price price-sale">'.giagoc($value['gia']).'</span> <span class="price">'.chuyentien($value['gia']).'</span></p>';
					echo' <a href="product-single.php?id='.$value['id_sp'].'"><button class="btn btn-primary py-3 px-5 mr-2"> Thêm vào giỏ hàng </button> </a>';
					echo'			</div>';
					echo'		</div>';
					echo'	</div>';
				}
					?>

					

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