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
                            <a href="danhmuc.php" class="btn btn-primary btn-round ml-auto">
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
                                    <li class="breadcrumb-item active" aria-current="page">Cập Nhật Danh Mục</li>
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
                                    <h4 class="card-title">Cập Nhật Danh Mục</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                    <?php
                                        $conn= new MySQLUtils();
                                        $conn->connectDB();
                                        if(isset($_GET["id"]))
                                        {
                                            
                                            $id_dm = $_GET["id"];
                                            $sql = "SELECT * FROM danhmuc WHERE id_dm = '$id_dm'";
                                            $result = $conn->selectQuery($sql);
                                    
                                        }
                                        if(isset($_POST["iddanhmuc"]) && isset($_POST["tendanhmuc"]))
                                            {
                                                $id = $_POST["iddanhmuc"];
                                                $tendanhmuc = $_POST["tendanhmuc"];
                                                $sql = "UPDATE danhmuc SET id_dm='$id', tendanhmuc ='$tendanhmuc' WHERE id_dm='$id_dm'";
                                                $conn->updateQuery($sql);
                                                ?>
				<script>
    				location.href = './danhmuc.php';
				</script>
				<?php
                                            }
                                 
                                    ?>

                                   
                                        <form class="form form-horizontal"  method = "POST" action = "">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                    <label>ID Danh Mục</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="ID Danh Mục" name="iddanhmuc" value = "<?php echo $result[0]['id_dm'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Tên Danh Mục</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Tên Danh Mục" name="tendanhmuc" value = "<?php echo $result[0]['tendanhmuc'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
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