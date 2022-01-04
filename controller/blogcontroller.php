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
    include './view/blog.php';
}

if($action=='blogdetail')
{
    include './view/blog-single.php';
}

if($action=='blogdetail1')
{
    include './view/blog-single1.php';
}

?>