<!DOCTYPE html>
<html lang="en">
<style type="text/css">
    #mydiv {
    position:fixed;
    top: 50%;
    left: 50%;
    width:30em;
    height:18em;
    margin-top: -9em; /*set to a negative number 1/2 of your height*/
    margin-left: -15em; /*set to a negative number 1/2 of your width*/
    border: 1px solid #ccc;
    background-color: #f3f3f3;
}
</style>
<head>
    <?php include 'assets/layouts/headerpage_Admin.php' ?>
</head>

<body>
    <div id="app">
        
        <div id="main">
           

            <div class="page-heading">
                <!-- Contextual classes start -->
                <section class="section">
                    <div class="col-md-8 col-12">
                        <form action="../controller/logincontroller.php" method="POST" >
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Đăng Nhập</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" action="../controller/logincontroller.php" method="POST">
                                            <div class="form-body">
                                                <div class="row">
                                                    
                                                    <div class="col-md-4">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="email" class="form-control"
                                                                    placeholder="Email" name="email" required="required">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-envelope"></i>
                                                                </div>
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
                                                                    placeholder="Mật Khẩu" name="password" required="required">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-lock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Đăng nhập</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Làm mới</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    
                </section>
                <!-- Contextual classes end -->

                
            </div>

           
        </div>
    </div>
    
</body>

</html>