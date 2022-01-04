<?php
if(!isset($_SESSION)){
    session_start();
}

$ngd=new nguoidungmodel();
?>
<div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-6 d-flex align-items-center">
						<p class="mb-0 phone pl-md-2">
						<a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +84 399 161 596</a> 
						<a href="#" ><span class="fa fa-paper-plane mr-1"></span> ngocha1999.hh@gmail.com</a>	
						</p>
					</div>
					<div class="col-md-6 d-flex justify-content-md-end">
						<div class="social-media mr-4">
			    		<p class="mb-0 d-flex">
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
			    		</p>
		        </div>
		        <div class="reg">
				<?php
                    if (!isset($_SESSION["idnguoidung"])){
				?>
		        	<p class="mb-0">
						<a href="index.php?controller=registercontroller&action=register" class="mr-2">Đăng Ký</a>&nbsp;/&nbsp;
						<a href="index.php?controller=logincontroller&action=login">Đăng Nhập</a>
					</p>
				<?php
					}else{
				?>
					<p class="mb-0">
					<ul class="navbar-nav ml-auto">	
         <a class="nav-link dropdown-toggle" id="dropdown03" data-toggle="dropdown"><font color="white"><span>Xin chào </span><?php $ttngd = $ngd->nguoidungcoma($_SESSION["idnguoidung"]); echo $ttngd[0]['tennguoidung'] ?></a></font>
              <div class="dropdown-menu" aria-labelledby="dropdown03">
			  <a class="dropdown-item" href="index.php?controller=changecontroller&action=changepass"> Đổi mật khẩu</a>  
			  </ul>
              </div>
					</p>
					<p class="mb-0">
					<a class="dropdown-item" href="index.php?controller=logincontroller&action=logout"><font color="white">Đăng xuất</font></a>
					</p>
				<?php
					}
				?>
		        </div>
					</div>
				</div>
			</div>
		</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">TH-<span>Coffee</span></a>
	      <div class="order-lg-last btn-group">
          <a href="index.php?controller=cartcontroller&action=cart" class="btn-cart dropdown-toggle dropdown-toggle-split">
          	<span class="flaticon-shopping-bag"></span>
          	
          </a>
          
        </div>

	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> THỰC ĐƠN
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Trang Chủ</a></li>
			  <li class="nav-item"><a href="index.php?controller=blogcontroller&action=blog" class="nav-link">Tin Tức</a></li>
			  <li class="nav-item"><a href="index.php?controller=sanphamcontroller&action=product" class="nav-link">Sản Phẩm</a></li>
	          <li class="nav-item"><a href="index.php?controller=aboutcontroller&action=about" class="nav-link">Giới Thiệu</a></li>
	          <li class="nav-item"><a href="index.php?controller=contactcontroller&action=contact" class="nav-link">Liên Hệ</a></li>
	        </ul>
	      </div>
	    </div>
		<div class="order-lg-last btn-group">
       	  	<form action="index.php" class="search-form" method="get">
       	  		<input type="hidden" name='controller' value='sanphamcontroller'>
                <input type="hidden" name='action' value='search'>
                <input type="text" class="form-control" placeholder="Tìm kiếm" name='kw'>
                <span class="fa fa-search" ></span>
              </form>
       	</div>
	  </nav>