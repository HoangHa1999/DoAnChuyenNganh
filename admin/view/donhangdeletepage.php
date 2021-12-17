<?php
include '../utils/MySQLUtils.php';

$conn= new MySQLUtils();
$conn->connectDB();
if(isset($_GET["id"]))
{
    $id_dh = $_GET["id"];
    $sql = "DELETE  FROM donhang WHERE id_dh ='$id_dh'";
    $conn->updateQuery($sql);
    header("location: donhang.php");
    exit();
}

?>