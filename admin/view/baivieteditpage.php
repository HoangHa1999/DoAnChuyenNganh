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
                                    <li class="breadcrumb-item active" aria-current="page">Cập Nhật Bài Viết</li>
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
                                    <h4 class="card-title">Cập Nhật Bài Viết</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                    <?php
                                        
                                        $conn= new MySQLUtils();
                                        $conn->connectDB();
                                        if(isset($_GET["id"]))
                                        {
                                            
                                            $id_bv = $_GET["id"];
                                            $sql = "SELECT * FROM baiviet WHERE id_bv = '$id_bv'";
                                            $result = $conn->selectQuery($sql);
                                    
                                        }
                                        
                                        if(isset($_POST["idbaiviet"]) && isset($_POST["tenbaiviet"])&& isset($_POST["ngayviet"])&& isset($_POST["gioviet"])&& isset($_POST["idnguoiviet"]) && isset($_POST["ndbaiviet"]))
                                        {
                                            $id_bv = $_POST["idbaiviet"];
                                            $tenbaiviet = $_POST["tenbaiviet"];
                                            $ngayviet = $_POST["ngayviet"];
                                            $gioviet = $_POST["gioviet"];
                                            $idnguoiviet = $_POST["idnguoiviet"];
                                            $noidung = $_POST["ndbaiviet"];

                                            $sql = "UPDATE baiviet SET id_bv ='$id_bv', tenbaiviet = '$tenbaiviet', noidung = '$noidung', ngayviet = '$ngayviet',gioviet = '$gioviet', id_nguoidung = '$idnguoiviet' WHERE id_bv='$id_bv'";
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
                                                        <label>ID bài viết:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="ID bài viết" name="idbaiviet" value = "<?php echo $result[0]['id_bv'] ?>">
                                                                
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
                                                                    placeholder="Tên bài viết" name="tenbaiviet" value = "<?php echo $result[0]['tenbaiviet'] ?>">
                                                                
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
                                                                    placeholder="Ngày viết" name="ngayviet" value = "<?php echo $result[0]['ngayviet'] ?>">
                                                                
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
                                                                    placeholder="Giờ viết" name="gioviet" value = "<?php echo $result[0]['gioviet'] ?>">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Id người Viết:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                            <select class="form-select" aria-label="Default select example" name="idnguoiviet" id="idnguoiviet">
                                                            <?php
                                                            $sql = "SELECT * FROM nguoidung WHERE admin = '0'";
                                                            $arr = $conn->selectQuery($sql);

                                                            foreach($arr as $value)
                                                            {
                                                                if($value['id_ngd'] == $result[0]['id_nguoidung'])
                                                                    echo '<option selected = "selected" value="'.$value['id_ngd'].'">'.$value['tennguoidung'].'</option>';
                                                                else
                                                                    echo '<option value="'.$value['id_ngd'].'">'.$value['tennguoidung'].'</option>';
                                                            }
                                                            ?>  
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Nội dung:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                            <script src="../../ckeditor/ckeditor.js"></script>
                                                                <textarea name="ndbaiviet"><?php echo $result[0]['noidung'] ?></textarea>
                                                                    <script type="text/javascript">CKEDITOR.replace('ndbaiviet');</script>
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