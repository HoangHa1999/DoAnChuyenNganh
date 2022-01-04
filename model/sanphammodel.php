<?php
class sanphammodel extends Db
{
    protected $_numPage=0;
    function numPage()
    {
        return $this->_numPage;
    }
    function alltheotrang($current_page=1)
    {
      $item_per_page= PAGE_SIZE;
      $offset = ($current_page-1) *$item_per_page;
      $sql='select Count(*) as dem from sanpham ';
      $data = $this->selectQuery($sql);
      $n = $data[0]['dem'];
      $this->_numPage= ceil($n/PAGE_SIZE);
     return $this->selectQuery("SELECT * FROM sanpham join danhmuc on sanpham.id_danhmuc = danhmuc.id_dm ORDER BY danhmuc.id_dm limit $offset, $item_per_page");
    }

    function all()
    {
     return $this->selectQuery('SELECT * FROM sanpham join danhmuc on sanpham.id_danhmuc = danhmuc.id_dm ORDER BY danhmuc.id_dm');
    }

    function search($kw)
    {
      $sql="SELECT * FROM sanpham join danhmuc on sanpham.id_danhmuc = danhmuc.id_dm where tensanpham like ?";
      $arr=["%$kw%"];
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