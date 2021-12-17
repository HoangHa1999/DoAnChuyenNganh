<?php
include '../utils/MySQLUtils.php';

$conn= new MySQLUtils();
$conn->connectDB();
if(isset($_GET["id"]))
{
    $id_sp = $_GET["id"];
    $sql = "DELETE  FROM sanpham WHERE id_sp ='$id_sp'";
    $conn->updateQuery($sql);
    header("location: sanpham.php");
    exit();
}

?>