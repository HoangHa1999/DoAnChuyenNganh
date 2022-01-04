<?php 
include './config.php';
function loadClass($className)
{
    include "./model/$className.php";
}

spl_autoload_register('loadClass');

$c = isset($_GET['controller'])?$_GET['controller']:'trangchu';
                
                if ($c=='trangchu' || $c=='sanphamcontroller')
                {
                    include './controller/sanphamcontroller.php';
                }
                if ($c=='blogcontroller')
                {
                    include './controller/blogcontroller.php';
                }
                if ($c=='aboutcontroller')
                {
                    include './controller/aboutcontroller.php';
                }
                if ($c=='contactcontroller')
                {
                    include './controller/contactcontroller.php';
                }
                if ($c=='registercontroller')
                {
                    include './controller/registercontroller.php';
                }
                if ($c=='logincontroller')
                {
                    include './controller/logincontroller.php';
                }
                if ($c=='cartcontroller')
                {
                    include './controller/cartcontroller.php';
                }
                if ($c=='forgotcontroller')
                {
                    include './controller/forgotcontroller.php';
                }
                if ($c=='changecontroller')
                {
                    include './controller/changecontroller.php';
                }
                if ($c=='xacthuccontroller')
                {
                    include './controller/xacthuccontroller.php';
                }
?>