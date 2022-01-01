<?php
if(!isset($_SESSION)){
    session_start();
}
if(empty($_SESSION["username"])){
    header("location: ../view/index.php");
            exit();
}

?>
<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index1.php"><img src="assets/images/logo/logo1.png" alt="Logo" srcset="" style="height: 100px;"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Tài Khoản</li>
                            <?php
                            if (!isset($_SESSION["username"])){
                             echo'<i class="bi bi-user"></i>';
                             echo' <a href="index.php" class="sidebar-link">
                                   <svg class="bi" width="1em" height="1em" fill="currentColor">
                                    <use
                                        xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#person-circle" />
                                    </svg>&nbsp Login</a>';
                            }else
                            echo'<li class="sidebar-item  has-sub">
                                    <a href="#" class="sidebar-link">
                                        <svg class="bi" width="1em" height="1em" fill="currentColor">
                                            <use
                                            xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#person-circle" />
                                        </svg>
                                        <span>&nbsp'.$_SESSION["username"].'</span>
                                    </a>
                                    <ul class="submenu ">
                                        <li class="submenu-item ">
                                            <a href="Logout.php">Logout</a>
                                        </li>
                                    </ul>
                                </li>';      
                            ?>
                        <li class="sidebar-title">Danh mục</li>

                        <li class="sidebar-item  ">
                            <a href="index1.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Bảng Điều Khiển</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            
                        </li>
                        <li class="sidebar-title">Bảng</li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Quản lý danh mục</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="danhmuc.php">Danh Mục</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="danhmuccreatepage.php">Thêm danh mục</a>
                                </li>
                            </ul>
                        </li>
                        
                       <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-lines-fill"></i>
                                <span> Quản lý người dùng</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="user.php">Người dùng</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="usercreatepage.php">Thêm người dùng</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-suit-club-fill"></i>
                                <span>Quản lý sản phẩm</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="sanpham.php">Sản phẩm</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="sanphamcreatepage.php">Thêm sản phẩm</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-cart-check-fill"></i>
                                <span>Quản lý đơn hàng</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="donhang.php">Đơn hàng</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="donhangcreatepage.php">Thêm đơn hàng</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-card-heading"></i>
                                <span>Quản lý bài viết</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="baiviet.php">Bài viết</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="baivietcreatepage.php">Thêm bài viết</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>