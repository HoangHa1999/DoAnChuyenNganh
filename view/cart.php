
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
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Trang chủ  <i class="fa fa-chevron-right"></i></a></span> <span>Giỏ hàng <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Giỏ hàng</h2>
          </div>
        </div>
      </div>
    </section>

	<?php
	
	if(isset($alert)){
	  echo $alert;
	}

	if(!empty($_SESSION["cart"])){
	?>

<form class="form form-horizontal"  method = "POST" action = "index.php?controller=cartcontroller&action=submit">
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						    <tr>
						    	<th>&nbsp;</th>
						    	<th>&nbsp;</th>
						    	<th>Sản phẩm</th>
						      <th>Giá tiền</th>
						      <th>Số lượng</th>
						      <th>Tổng</th>
						      	<th>&emsp;</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						  	
							 
						  	$tongtien = 0;
						  	foreach($data as $value){
						    echo '<tr class="alert" role="alert">';
						    echo '	<td>';
						    echo '		<label class="checkbox-wrap checkbox-primary">';
							echo '			  <input type="checkbox" checked>';
							echo '			  <span class="checkmark"></span>';
							echo '			</label>';
						    echo '	</td>';
						    echo '	<td>';
						    echo '		<a href="index.php?controller=sanphamcontroller&action=productdetail&id='.$value['id_sp'].'"><div class="img" style="background-image: url(admin/view/assets/images/faces/'.$value['hinh'].');"></div></a>';
						    echo '	</td>';
						    echo '  <td>';
						    echo '  	<div class="email">';
						    echo '  		<span>'.$value['tensanpham'].'</span>';
						    
						    echo '  	</div>';
						    echo '  </td>';
						    echo '  <td>'.chuyentien($value['gia']).'</td>';
						    echo '  <td class="quantity">';
					        echo '	<div class="input-group" style="width: 78px;">';
				            echo ' 	<input type="number" name="quantity['.$value['id_sp'].']" class="quantity form-control input-number" value="'.$_SESSION['cart'][$value['id_sp']].'" min="1" max="100">';
				          	echo '</div>';
				          	echo '</td>';
							
							$tongtien += $value['gia']*$_SESSION["cart"][$value['id_sp']];
				          	echo '<td>'.chuyentien($value['gia']*$_SESSION["cart"][$value['id_sp']]).'</td>';
						    echo '  <td>';
						    echo '  	<a href="index.php?controller=cartcontroller&action=delete&id='.$value['id_sp'].'"><button  type="button" class="close"  aria-label="Close">';
				            echo '	<span aria-hidden="true"><i class="fa fa-close"></i></span>';
				          	echo '</button> </a>';
				        	echo '</td>';
						    echo '</tr>';
							}
						    ?>						    
						  </tbody>
						</table>
					</div>
    		</div>
			<div class="row justify-content-end">
    			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
					<button type="submit" name="btncapnhat" value="thanhtoan" class="btn btn-primary"> Cập nhật </button>
					</div>
    		</div>
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
    				<button type="submit" name="btnthanhtoan" value="thanhtoan" class="btn btn-primary"> Thanh toán </button>
    			</div>
    		</div>
    	</div>
    </section>
</form>
<?php } ?>

    <footer class="ftco-footer">
		<?php include 'view/layouts/footerpage.php' ?>
    </footer>
    <!-- loader -->
   <?php include "view/layouts/loaderpage.php" ?>
    
  </body>
</html>