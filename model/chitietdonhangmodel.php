<?php
class chitietdonhangmodel extends Db
{
    function all()
    {
     return $this->selectQuery('SELECT * FROM chitietdonhang');
    }

    function insert($id_dh, $id_sp, $gia, $soluong)
    { 
      
      //$sql="INSERT INTO chitietdonhang (id_dh, id_sp, gia, soluong) VALUES ".$dh.";";
      $sql="INSERT INTO chitietdonhang VALUES ('$id_dh', '$id_sp', '$gia', '$soluong')";
      return $this->updateQuery($sql);
    }

}
?>