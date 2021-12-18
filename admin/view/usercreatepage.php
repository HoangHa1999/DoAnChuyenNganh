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
                            <a href="user.php" class="btn btn-primary btn-round ml-auto">
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
                                    <li class="breadcrumb-item active" aria-current="page">Thêm Người Dùng</li>
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
                                    <h4 class="card-title">Thêm người dùng</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                    <?php
                                        
                                        $conn= new MySQLUtils();
                                        $conn->connectDB();
                                        if(isset($_POST["id_ngd"]) && isset($_POST["tennguoidung"])&& isset($_POST["gt"])&& isset($_POST["email"])&& isset($_POST["password"])&& isset($_POST["sdt"])&& isset($_POST["diachi"])&& isset($_POST["hd"])&& isset($_POST["ad"]))
                                        {
                                            $id_ngd = $_POST["id_ngd"];
                                            $tennguoidung = $_POST["tennguoidung"];
                                            $gt = $_POST["gt"];
                                            $email = $_POST["email"];
                                            $password = md5($_POST["password"]);
                                            $sdt = $_POST["sdt"];
                                            $diachi = $_POST["diachi"];
                                            $hd = $_POST["hd"];
                                            $ad = $_POST["ad"];

                                            $sql = "INSERT INTO nguoidung VALUES('$id_ngd', '$tennguoidung', '$gt', '$email', '$password', '$sdt', '$diachi', '$hd', '$ad')";
                                            $conn->updateQuery($sql);
                                            ?>
				<script>
    				location.href = './user.php';
				</script>
				<?php
                                        }
                                        
                                    ?>

                                        <form class="form form-horizontal"  method = "POST" action = "">
                                            <div class="form-body">
                                                <div class="row">
                                                <div class="col-md-4">
                                                        <label>ID người dùng:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="ID người dùng" name="id_ngd" required="required">
                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <label>Tên người dùng</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Tên người dùng" name="tennguoidung" required="required">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Giới tính:</label>
                                                    </div>
                                                    <div class="form-group col-md-8 offset-md-4">
                                                        <div class='form-check'>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="radio1" name = "gt" value = "1"
                                                                    class='form-check-input' checked>
                                                                <label for="radio1">Nam</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="radio2" name = "gt" value = "0"
                                                                    class='form-check-input'>
                                                                <label for="radio2">Nữ</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="email" class="form-control"
                                                                    placeholder="Email" name="email" required="required">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Mật Khẩu</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="password" class="form-control"
                                                                    placeholder="Mật khẩu" name="password" required="required">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Số Điện Thoại</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Số điện thoại" name="sdt"required="required">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-4">
                                                        <label>Địa chỉ</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Địa chỉ" name="diachi" required="required">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                     

                                                    <div class="col-md-4">
                                                        <label>Hoạt Động:</label>
                                                    </div>
                                                    <div class="form-group col-md-8 offset-md-4">
                                                        <div class='form-check'>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="radio3" name = "hd" value = "1"
                                                                    class='form-check-input' checked>
                                                                <label for="radio3">Hoạt động</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="radio4" name = "hd" value = "0"
                                                                    class='form-check-input'>
                                                                <label for="radio4">Không hoạt động</label>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <label>Admin:</label>
                                                    </div>
                                                    <div class="form-group col-md-8 offset-md-4">
                                                        <div class='form-check'>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="radio5" name = "ad" value = "1"
                                                                    class='form-check-input'checked>
                                                                <label for="radio5">Admin</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="radio6" name = "ad" value = "0"
                                                                    class='form-check-input'>
                                                                <label for="radio6">Không phải admin</label>
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