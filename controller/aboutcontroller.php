<?php
$action=isset($_GET['action'])?$_GET['action']:'index';
$sp=new sanphammodel();

if($action=='index')
{
	$data=$sp->all();
	include './view/index.php';
}

if($action=='about')
{
    include './view/about.php';
}

if($action=='checkout')
{
    include './view/checkout.php';
}

?>