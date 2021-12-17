<?php
include '../utils/MySQLUtils.php';

$conn= new MySQLUtils();
$conn->connectDB();
if(isset($_GET["id"]))
{
    $id_ngd = $_GET["id"];
    $sql = "DELETE  FROM nguoidung WHERE id_ngd ='$id_ngd'";
    $conn->updateQuery($sql);
    header("location: user.php");
    exit();
}

?>