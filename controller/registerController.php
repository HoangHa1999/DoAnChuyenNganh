<?php
//	function detect_number($number){
//		if (strlen($number) != 10){
//			return false;
//		}
//		if (preg_match('/^([0-9\s\-\+\(\)]*)$/',$number)){
//			return true;
//		}
// 	return false;
//	}


//	$txt_phone = "0707863088";
//	echo $txt_phone . "<hr>";
//	echo detect_number($txt_phone);

/////////////////////////////////////////////////////////////////////////////////////////////////
	class PHANSO{
    private $tuso;
    private $mauso;
    public function congPS($b){
        return($this->tuso * $b->mauso + $this->mauso * $b->tuso) / ($this->mauso * $b->mauso);
    }
    public function truPS($b){
        return($this->tuso * $b->mauso - $this->mauso * $b.$tuso) / ($this->mauso*$b->mauso);
    }
    public function ganPS($b){
    	$this->tuso = $b->tuso;
    	$this->mauso = $b->mauso;
    }
    public function xuatPS($b){
    	echo $this->tuso ."/". $this->mauso;
    }
    public function _construct($tu,$mau){
        $this->tuso*$tu;
        if($mau!=0){
            $this->mauso=$mau;
        }
    }
    public function _dedestruct(){
        $this->tuso=0;
        $this->mauso=1;
    }
    public function get_TuSo(){
        return $this->tuso;
    }
    public function get_MauSo(){
        return $this->mauso;
    }
}
$a=new PHANSO(1,2);
$b=new PHANSO(2,3);
$c=$a->congPS($b);
?>