<?php
include '../utils/MySQLUtils.php';

$conn= new MySQLUtils();
$conn->connectDB();
if(isset($_GET["id"]))
{
    $id_dm = $_GET["id"];
    $sql = "DELETE  FROM danhmuc WHERE id_dm ='$id_dm'";
    $conn->updateQuery($sql);
    header("location: danhmuc.php");
    exit();
}

?>