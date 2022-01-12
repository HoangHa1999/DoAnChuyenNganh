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
                            <h3>Bảng</h3>
                            
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index1.php">Bảng Điều khiển</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Đơn Hàng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

               

                <!-- Contextual classes start -->
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Danh Sách Đơn Hàng
                        </div>
                         <!-- <div class="card-header">
                        <a href="donhangcreatepage.php" class="btn btn-primary btn-round ml-auto">
                        Thêm Đơn Hàng</a> 
                        
                        </div> -->
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Khách hàng</th>
                                        <th>SĐT</th>
                                        <th>Ngày lập</th> 
                                        <th>Giờ giao</th>
                                        <th>Nơi giao</th>
                                        <th>Thành tiền</th>
                                        <th>Trạng thái thanh toán</th>
                                        <th>Hình thức thanh toán</th>
                                        <th>Xem chi tiết</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        function chuyenUSD($chuyen){
                                            return number_format($chuyen * 23000,0,",",".") ." VNĐ";
                                        }
                                        $conn= new MySQLUtils();
                                        $conn->connectDB();
                                        $sql = "SELECT * FROM donhang";
                                        $result = $conn->selectQuery($sql);
        
                                    foreach($result as $value){
                                    if($value['hinhthucthanhtoan'] == true)
                                    {
                                        $hinhthucthanhtoan = "Chuyển khoản";
                                    }
                                    else
                                    {
                                        $hinhthucthanhtoan = "Tiền mặt";
                                    }
                                    echo '<tr>';
                                        echo    '<td>'.$value['id_dh'].'</td>';
                                        echo    '<td>'.$value['tennguoinhan'].'</td>';
                                        echo    '<td>'.$value['sdt'].'</td>';
                                        echo    '<td>'.$value['ngaylap'].'</td>';
                                        echo    '<td>'.$value['giogiao'].'</td>';
                                        echo    '<td>'.$value['noigiao'].'</td>';
                                        
                                         echo'<td>'.chuyenUSD($value['thanhtien']).'</td>';
                                         echo'<td>';
                                         if($value['trangthaithanhtoan']==true)
                                            {
                                                echo'<span class="badge bg-success">Đã thanh toán</span>';
                                            }
                                            else
                                            {
                                                echo'<span class="badge bg-danger">Chưa thanh toán</span>';
                                            }
                                            
                                        echo'</td>';
                                        echo'<td>'.$hinhthucthanhtoan.'</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="donhangchitiet.php?id='.$value['id_dh'].'" type="submit" data-toggle="tooltip" title="" class="btn btn-primary btn-round ml-auto" data-original-title="Edit Task">
                                                    <svg class="bi" width="1em" height="1em" fill="currentColor">
                                                       <use
                                                    xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#info-circle-fill" />
                                                    </svg>
                                                    Chi tiết
                                                </a>
                                                </div>
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                             <!-- <a href="donhangeditpage.php?id='.$value['id_dh'].'" type="submit" data-toggle="tooltip" title="" class="btn btn-primary btn-round ml-auto" data-original-title="Edit Task">
                                                    <svg class="bi" width="1em" height="1em" fill="currentColor">
                                                       <use
                                                    xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#pencil-square" />
                                                    </svg>
                                                    Sửa
                                                </a> -->
                                               
                                                <a href="donhangdeletepage.php?id='.$value['id_dh'].'" type="submit" data-toggle="tooltip" title="" class="btn btn-primary btn-round ml-auto" data-original-title="Remove">
                                                     <svg class="bi" width="1em" height="1em" fill="currentColor">
                                                      <use
                                                       xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#trash-fill" />
                                                     </svg>
                                                    Xóa
                                                </a>
                                            </div>
                                        </td>
                                    </tr>';                                   
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