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
                                    <li class="breadcrumb-item active" aria-current="page">Cập Nhật Đơn Hàng</li>
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
                                    <h4 class="card-title">Cập Nhật Đơn Hàng</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                    <?php
                                        
                                        $conn= new MySQLUtils();
                                        $conn->connectDB();

                                        if(isset($_GET["id"]))
                                        {
                                            
                                            $id_dh = $_GET["id"];
                                            $sql = "SELECT * FROM donhang WHERE id_dh = '$id_dh'";
                                            $result = $conn->selectQuery($sql);
                                    
                                        }
                                        
                                        if(isset($_POST["id_dh"]) && isset($_POST["id_ngd"])&& isset($_POST["ngaylap"])&& isset($_POST["giogiao"])&& isset($_POST["noigiao"]) && isset($_POST["thanhtien"])&& isset($_POST["tt"])&& isset($_POST["ht"]))
                                        {
                                            $id = $_POST["id_dh"];
                                            $id_ngd = $_POST["id_ngd"];
                                            $ngaylap = $_POST["ngaylap"];
                                            $giogiao = $_POST["giogiao"];
                                            $noigiao = $_POST["noigiao"];
                                            $thanhtien = $_POST["thanhtien"];
                                            $tt = $_POST["tt"];
                                            $ht = $_POST["ht"];

                                            
                                            $sql = "UPDATE donhang SET id_dh ='$id',ngaylap = '$ngaylap',giogiao= '$giogiao',noigiao= '$noigiao',thanhtien = '$thanhtien',trangthaithanhtoan = '$tt',hinhthucthanhtoan = '$ht', id_nguoidung ='$id_ngd' WHERE id_dh ='$id_dh'";
                                            $conn->updateQuery($sql);
                                            ?>
				<script>
    				location.href = './donhang.php';
				</script>
				<?php
                                        }
                                     
                                    ?>
                                        <form class="form form-horizontal"  method = "POST" action = "" >
                                            <div class="form-body">
                                                <div class="row">
                                                <div class="col-md-4">
                                                        <label>ID đơn hàng:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="ID đơn hàng" name="id_dh" value = "<?php echo $result[0]['id_dh'] ?>">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Khách hàng:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                            <select class="form-select" aria-label="Default select example" name="id_ngd" id="id_ngd">
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
                                                        <label>Ngày lập:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="date" class="form-control"
                                                                    placeholder="Ngày lập" name="ngaylap" value = "<?php echo $result[0]['ngaylap'] ?>">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-4">
                                                        <label>Giờ giao:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="time" class="form-control"
                                                                    placeholder="Giờ giao" name="giogiao" value = "<?php echo $result[0]['giogiao'] ?>" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Nơi giao:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nơi giao" name="noigiao" value = "<?php echo $result[0]['noigiao'] ?>">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Thành tiền:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Thành tiền ... $" name="thanhtien" value = "<?php echo $result[0]['thanhtien'] ?>">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <label>Trạng thái thanh toán:</label>
                                                    </div>
                                                    <div class="form-group col-md-8 offset-md-4">
                                                        <div class='form-check'>
                                                        <?php
                                                                if($result[0]['trangthaithanhtoan'] == true){
                                                            ?>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="radio1" name = "tt" value = "1"
                                                                    class='form-check-input' checked>
                                                                <label for="radio1">Đã thanh toán</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="radio2" name = "tt" value = "0"
                                                                    class='form-check-input'>
                                                                <label for="radio2">Chưa thanh toán</label>
                                                            </div>
                                                            <?php
                                                                }else{
                                                            ?>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="radio1" name = "tt" value = "1"
                                                                    class='form-check-input' >
                                                                <label for="radio1">Đã thanh toán</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="radio2" name = "tt" value = "0"
                                                                    class='form-check-input'checked>
                                                                <label for="radio2">Chưa thanh toán</label>
                                                            </div>
                                                            <?php
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                     
                                                    <div class="col-md-4">
                                                        <label>Hình thức thanh toán:</label>
                                                    </div>
                                                    <div class="form-group col-md-8 offset-md-4">
                                                        <div class='form-check'>
                                                        <?php
                                                                if($result[0]['hinhthucthanhtoan'] == true){
                                                            ?>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="radio3" name = "ht" value = "1"
                                                                    class='form-check-input' checked>
                                                                <label for="radio3">Chuyển khoản</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="radio4" name = "ht" value = "0"
                                                                    class='form-check-input'>
                                                                <label for="radio4">Tiền mặt</label>
                                                            </div>
                                                            <?php
                                                                }else{
                                                            ?>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="radio3" name = "ht" value = "1"
                                                                    class='form-check-input' >
                                                                <label for="radio3">Chuyển khoản</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="radio4" name = "ht" value = "0"
                                                                    class='form-check-input' checked>
                                                                <label for="radio4">Tiền mặt</label>
                                                            </div>
                                                            <?php
                                                                }
                                                            ?>
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