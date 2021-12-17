<?php 

define("Ty_gia", 23000);
function chuyentien($gia){
	return number_format($gia * Ty_gia,0,",",".") . " VNĐ";

}

function chuyentiena($gia){
	return $gia / Ty_gia. " $";
}

function giagoc($gia){
	$gia = $gia* Ty_gia + ($gia* Ty_gia * 0.1);
	return number_format($gia,0,",",".") . " VNĐ";
}
?>