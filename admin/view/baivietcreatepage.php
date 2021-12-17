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
                            <a href="baiviet.php" class="btn btn-primary btn-round ml-auto">
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
                                    <li class="breadcrumb-item active" aria-current="page">Thêm Bài Viết</li>
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
                                    <h4 class="card-title">Thêm Bài Viết</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                    <?php
                                        
                                        $conn= new MySQLUtils();
                                        $conn->connectDB();

                                        
                                        if(isset($_POST["idbaiviet"]) && isset($_POST["tenbaiviet"])&& isset($_POST["ngayviet"])&& isset($_POST["gioviet"])&& isset($_POST["idnguoiviet"]))
                                        {
                                            $id_bv = $_POST["idbaiviet"];
                                            $tenbaiviet = $_POST["tenbaiviet"];
                                            $ngayviet = $_POST["ngayviet"];
                                            $gioviet = $_POST["gioviet"];
                                            $idnguoiviet = $_POST["idnguoiviet"];

                                            $sql = "INSERT INTO baiviet VALUES('$id_bv', '$tenbaiviet', '$ngayviet', '$gioviet', '$idnguoiviet')";
                                            $conn->updateQuery($sql);
                                            ?>
				<script>
    				location.href = './baiviet.php';
				</script>
				<?php
                                        }
                                     
                                    ?>
                                        <form class="form form-horizontal"  method = "POST" action = "">
                                            <div class="form-body">
                                                <div class="row">
                                                <div class="col-md-4">
                                                        <label>Mã bài viết:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Mã bài viết" name="idbaiviet" required="required">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Tên bài viết:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Tên bài viết" name="tenbaiviet" required="required">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Ngày Viết:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="date" class="form-control"
                                                                    placeholder="Ngày viết" name="ngayviet" required="required">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <label>Giờ Viết:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="time" class="form-control"
                                                                    placeholder="Giờ viết" name="gioviet" required="required">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Id người Viết:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                            <select name="idnguoiviet" id="idnguoiviet">
                                                            <?php
                                                            $sql = "SELECT * FROM nguoidung WHERE admin = '0'";
                                                            $result = $conn->selectQuery($sql);

                                                            foreach($result as $value)
                                                            {
                                                                echo '<option value="'.$value['id_ngd'].'">'.$value['tennguoidung'].'</option>';
                                                            }
                                                            ?>  
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
 
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Thêm</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Làm mới</button>
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