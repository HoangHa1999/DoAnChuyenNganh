<?php
$action=isset($_GET['action'])?$_GET['action']:'index';
$sp=new sanphammodel();
$dm=new danhmucmodel();
if($action=='index')
{
	$data=$sp->all();
	include './view/index.php';
}

if($action=='product')
{
    $datadm = $dm->all();
	$data=$sp->all();
	

    $id_dm= isset($_GET['id'])?$_GET['id']:'';
    if($id_dm!='')
    {
        $data=$sp->sptrongdanhmuc($id_dm);
    }
    include './view/product.php';
}

if($action=='productdetail')
{
    $id_sp= isset($_GET['id'])?$_GET['id']:'';
    if($id_sp!='')
    {
        $data=$sp->spcoma($id_sp);
    }
    include './view/product-single.php';
}

if ($action=='search')
{
    $kw = isset($_GET['kw'])?$_GET['kw']:'';
    $data =$sp->search($kw);
    include './view/index.php';
}


?>