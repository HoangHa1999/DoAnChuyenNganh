<?php
class sanphammodel extends Db
{
    function all()
    {
     return $this->selectQuery('SELECT * FROM sanpham join danhmuc on sanpham.id_danhmuc = danhmuc.id_dm ORDER BY danhmuc.id_dm');
    }

    function search($kw)
    {
      $sql="SELECT * FROM sanpham where tensanpham like ?";
      $arr=["%kw%"];
      return $this->selectQuery($sql, $arr);
    }

    function spcoma($id_sp)
    {
      $sql = "SELECT * FROM sanpham WHERE sanpham.id_sp = '$id_sp'";
      return $this->selectQuery($sql);
    }    

    function sptrongdanhmuc($id_dm)
    {
      $sql = "SELECT * FROM sanpham join danhmuc on sanpham.id_danhmuc = danhmuc.id_dm WHERE sanpham.id_danhmuc = '$id_dm'";
      return $this->selectQuery($sql);
    }
    
    function sptrongcart()
    {
      if(!empty($_SESSION["cart"])){
        $sql ="SELECT * FROM sanpham WHERE id_sp IN ('".implode("','", array_keys($_SESSION["cart"]))."')";
        return $this->selectQuery($sql);
      }
    
    }
}
?>