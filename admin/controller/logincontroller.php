<?php
if(!isset($_SESSION)){
                session_start();               
            }

include_once '../utils/MySQLUtils.php';

if (count($_POST) > 0) {
    $conn= new MySQLUtils();
    $conn->connectDB();
    $sql = "SELECT * FROM nguoidung";
                                        
    $result = $conn->selectQuery($sql);
        
    foreach($result as $value){
        if($value['email'] == $_POST["email"] && $value['password'] == md5($_POST["password"]) && $value['admin'] == 1 && $value['hoatdong'] == 1)
        {

            $_SESSION["username"]=$value['tennguoidung'];
            header("location: ../view/index1.php");
            exit();
        }
        
    }
}

header("location: ../view/index.php");
            exit();

?>

