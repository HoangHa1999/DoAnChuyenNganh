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
                                    <li class="breadcrumb-item active" aria-current="page">Danh Sách Người Dùng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Contextual classes start -->
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Danh Sách Người Dùng
                        </div>
                        <div class="card-header">
                        <a href="usercreatepage.php" class="btn btn-primary btn-round ml-auto">
                        Thêm Người Dùng</a>
                        
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Giới tính</th>
                                        <th>Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Địa Chỉ</th>
                                        <th>Hoạt Động</th>
                                        <th>Admin</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $conn= new MySQLUtils();
                                    $conn->connectDB();
                                    $sql = "SELECT * FROM nguoidung";
                                    $result = $conn->selectQuery($sql);
    
                                foreach($result as $value){
                                    if($value['gioitinh'] == true)
                                    {
                                        $gioitinh = "Nam";
                                    }
                                    else{
                                        $gioitinh = "Nữ";
                                    }

                                    if($value['admin']==true)
                                            {
                                                $admin = "Admin";
                                            }
                                            else
                                            {
                                                $admin = "";
                                            }
                                        echo '<tr>';
                                        echo    '<td>'.$value['id_ngd'].'</td>';
                                        echo    '<td>'.$value['tennguoidung'].'</td>';
                                        echo    '<td>'.$gioitinh.'</td>';
                                        echo    '<td>'.$value['email'].'</td>';
                                        echo    '<td>'.$value['sdt'].'</td>';
                                        echo    '<td>'.$value['diachi'].'</td>';
                                        echo'<td>';
                                         if($value['hoatdong']==true)
                                            {
                                                echo'<span class="badge bg-success">Hoạt động</span>';
                                            }
                                            else
                                            {
                                                echo'<span class="badge bg-danger">Không hoạt động</span>';
                                            }
                                            
                                        echo'</td>';
                                        echo    '<td>'.$admin.'</td>';
                                        echo'<td>
                                        <div class="form-button-action">
                                            <a href="usereditpage.php?id='.$value['id_ngd'].'" type="submit" data-toggle="tooltip" title="" class="btn btn-primary btn-round ml-auto" data-original-title="Edit Task">
                                                <svg class="bi" width="1em" height="1em" fill="currentColor">
                                                   <use
                                                   xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#pencil-square" />
                                                </svg>
                                                Sửa
                                            </a>
                                            <a href="userdeletepage.php?id='.$value['id_ngd'].'" type="submit" data-toggle="tooltip" title="" class="btn btn-primary btn-round ml-auto" data-original-title="Remove">
                                                 <svg class="bi" width="1em" height="1em" fill="currentColor">
                                                  <use
                                                   xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#trash-fill" />
                                                 </svg>
                                                Xóa
                                            </a>
                                        </div>
                                    </td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                    <!-- <span class="badge bg-danger">Không Hoạt Động</span> --> 
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