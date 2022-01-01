<?php
$action=isset($_GET['action'])?$_GET['action']:'index';
$sp=new sanphammodel();

if($action=='index')
{
	$data=$sp->all();
	include './view/index.php';
}

if($action=='blog')
{
    include './view/blog-single.php';
}

if($action=='blog1')
{
    include './view/blog-single1.php';
}




?>