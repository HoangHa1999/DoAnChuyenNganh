<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'assets/layouts/headerpage_Admin.php' ?>
    <?php include '../utils/MySQLUtils.php' ?>
    <?php include '../utils/tienich.php' ?>
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
                            <a href="sanpham.php" class="btn btn-primary btn-round ml-auto">
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
                                    <li class="breadcrumb-item active" aria-current="page">Cập Nhật Sản Phẩm</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

               

                <!-- Contextual classes start -->
                <section class="section">
                    <div class="col-md-12 col-12">
                            <div class="card">
                                
                                <div class="card-header">
                                    <h4 class="card-title">Cập Nhật Sản Phẩm</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                    <?php
                                        
                                        $conn= new MySQLUtils();
                                        $conn->connectDB();

                                        if(isset($_GET["id"]))
                                        {
                                            
                                            $id_sp = $_GET["id"];
                                            $sql = "SELECT * FROM sanpham WHERE id_sp = '$id_sp'";
                                            $result = $conn->selectQuery($sql);
                                    
                                        }

                                        if(isset($_GET['upload']) && $_GET['upload'] =='file'){
                                            
                                            $uploadedFile = $_FILES['file_upload'];
                                            $errors = uploadFiles($uploadedFile);
                                            if(!empty($errors)){
                                                print_r($errors);
                                                exit;
                                            }
                                        }

                                        if(isset($_POST["id_sp"]) && isset($_POST["tensanpham"])&& isset($_POST["id_dm"])&& isset($_POST["gia"])&& isset($_FILES["file_upload"]))
                                        {
                                            $id = $_POST["id_sp"];
                                            $tensanpham = $_POST["tensanpham"];
                                            $id_dm = $_POST["id_dm"];
                                            $gia = $_POST["gia"];
                                            $hinh = $_FILES['file_upload']['name'][0];
                                           

                                            $sql = "UPDATE sanpham SET id_sp = '$id',hinh = '$hinh' ,tensanpham = '$tensanpham',gia = '$gia',id_danhmuc = '$id_dm' WHERE id_sp='$id_sp'";
                                            $conn->updateQuery($sql);
                                            ?>
                                            <script>
                                                location.href = './sanpham.php';
                                            </script>
                                            <?php
                                        }
                                        
                                    ?>
                                    <form class="form form-horizontal"  method = "POST" action = "?upload=file&id=<?php echo $id_sp ?>" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                <div class="col-md-4">
                                                        <label>ID Sản Phẩm:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="ID sản phẩm" name="id_sp" value = "<?php echo $result[0]['id_sp'] ?>">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Tên Sản Phẩm</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Tên sản phẩm" name="tensanpham" value = "<?php echo $result[0]['tensanpham'] ?>">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Tên Danh Mục:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                            <select class="form-select" aria-label="Default select example" name="id_dm" id="id_dm">
                                                            <?php
                                                            $sql = "SELECT * FROM danhmuc";
                                                            $arr = $conn->selectQuery($sql);

                                                            foreach($arr as $value)
                                                            {
                                                                if($value['id_dm'] == $result[0]['id_danhmuc'])
                                                                    echo '<option selected = "selected" value="'.$value['id_dm'].'">'.$value['tendanhmuc'].'</option>';
                                                                else
                                                                    echo '<option value="'.$value['id_dm'].'">'.$value['tendanhmuc'].'</option>';
                                                            }
                                                            ?>  
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Giá</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Giá .... $" name="gia" value = "<?php echo $result[0]['gia'] ?>">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                            <label for="formFile" class="form-label">Hình</label>
                                                            <input class="form-control" multiple type="file"  name = "file_upload[]" value ="<?php echo $result[0]['hinh'] ?>">
                                                      </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" value = "Upload File"
                                                            class="btn btn-primary me-1 mb-1">Sửa</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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