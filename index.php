<?php 
include 'utils/MySQLUtils.php';
function loadClass($className)
{
    include "./models/$className.php";
}
?>