<?php
class donhangmodel extends Db
{
    function all()
    {
     return $this->selectQuery('SELECT * FROM donhang');
    }

    function insert($id_dh, $giogiao, $tennguoinhan, $sdt, $noigiao, $thanhtien, $trangthaithanhtoan='0', $hinhthucthanhtoan ='0' , $id_nguoidung)
    { 
      
      $sql="INSERT INTO donhang VALUES ('$id_dh', CURRENT_TIMESTAMP, '$giogiao', '$tennguoinhan', '$sdt', '$noigiao', '$thanhtien', '$trangthaithanhtoan', '$hinhthucthanhtoan', '$id_nguoidung')";
      return $this->updateQuery($sql);
    }

}
?>