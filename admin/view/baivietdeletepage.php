<?php
include '../utils/MySQLUtils.php';

$conn= new MySQLUtils();
$conn->connectDB();
if(isset($_GET["id"]))
{
    $id_bv = $_GET["id"];
    $sql = "DELETE  FROM baiviet WHERE id_bv ='$id_bv'";
    $conn->updateQuery($sql);
    header("location: baiviet.php");
    exit();
}

?>