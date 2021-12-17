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
                                    <li class="breadcrumb-item active" aria-current="page">Danh Mục</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

               

                <!-- Contextual classes start -->
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Danh Sách Danh Mục
                        </div>
                        <div class="card-header">
                        <a href="danhmuccreatepage.php" class="btn btn-primary btn-round ml-auto">
                        Thêm Danh Mục</a>
                        
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Danh Mục</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php
                                        
                                        $conn= new MySQLUtils();
                                        $conn->connectDB();
                                        $sql = "SELECT * FROM danhmuc";
                                        
                                        $result = $conn->selectQuery($sql);
        
                                    foreach($result as $value){
                                    echo'<tr>
                                        <td>'.$value['id_dm'].'</td>
                                        <td>'.$value['tendanhmuc'].'</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="danhmuceditpage.php?id='.$value['id_dm'].'" type="submit" data-toggle="tooltip" title="" class="btn btn-primary btn-round ml-auto" data-original-title="Edit Task">
                                                    <svg class="bi" width="1em" height="1em" fill="currentColor">
                                                       <use
                                                       xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#pencil-square" />
                                                    </svg>
                                                    Sửa
                                                </a>
                                                <a href="danhmucdeletepage.php?id='.$value['id_dm'].'" type="submit" data-toggle="tooltip" title="" class="btn btn-primary btn-round ml-auto" data-original-title="Remove">
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