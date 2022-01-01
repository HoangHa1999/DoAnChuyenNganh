<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'assets/layouts/headerpage_Admin.php' ?>
    <?php include '../utils/MySQLUtils.php' ?>
</head>

<body>
    <div id="app">
        <?php include 'assets/layouts/menupage_Admin.php' ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <a href="donhang.php" class="btn btn-primary btn-round ml-auto">
                            <svg class="bi" width="1em" height="1em" fill="currentColor">
                                <use
                                    xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#arrow-counterclockwise" />
                                </svg>
                            Trở lại</a>
                        
                            
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index1.php">Bảng Điều khiển</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chi Tiết Đơn Hàng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

               

                <!-- Contextual classes start -->
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Chi Tiết Đơn Hàng
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hình</th>
                                        <th>Sản phẩm</th>
                                        <th>Giá tiền</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        function chuyenUSD($chuyen){
                                            return number_format($chuyen * 23000,0,",",".") ." VNĐ";
                                        }
                                        $conn= new MySQLUtils();
                                        $conn->connectDB();
                                        $sql = "SELECT * FROM chitietdonhang join sanpham on chitietdonhang.id_sp = sanpham.id_sp";
                                        $result = $conn->selectQuery($sql);
                                      
                                    $stt =0;
                                    foreach($result as $value){
                                    $stt++;
                                    ?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td>
                                            <div class="avatar avatar-md">
                                            <img src="assets/images/faces/<?php echo $value['hinh'] ?>">
                                            </div>
                                        </td>
                                        <td><?php echo $value['tensanpham'] ?></td>
                                        <td><?php echo chuyenUSD($value['gia']) ?></td>
                                        <td><?php echo $value['soluong'] ?></td>
                                        <td><?php echo chuyenUSD($value['gia']*$value['soluong']) ?></td>
                                        </tr>
                                        <?php                                   
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
                <!-- Contextual classes end -->

                
            </div>

            <footer>
                <?php include 'assets/layouts/footerpage_Admin.php' ?>
            </footer>
        </div>
    </div>
    
</body>

</html>