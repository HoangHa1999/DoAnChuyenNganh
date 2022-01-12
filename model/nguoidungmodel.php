<?php
class nguoidungmodel extends Db
{
    function all()
    {
     return $this->selectQuery('SELECT * FROM nguoidung');
    }

    function nguoidungcoma($id_ngd)
    {
      $sql = "SELECT * FROM nguoidung WHERE id_ngd = '$id_ngd'";
      return $this->selectQuery($sql);
    }

    function nguoidungcoemail($email)
    {
      $sql = "SELECT * FROM nguoidung WHERE email = '$email'";
      return $this->updateQuery($sql);
    }

    function laynguoidungcoemail($email)
    {
      $sql = "SELECT * FROM nguoidung WHERE email = '$email'";
      return $this->selectQuery($sql);
    }

    function nguoidungcopass($pw)
    {
      $sql = "SELECT * FROM nguoidung WHERE password = '$pw'";
      return $this->updateQuery($sql);
    }

    function capnhatpass($email, $pw)
    {
      $sql = "UPDATE nguoidung SET password = '$pw' WHERE  email = '$email'";
      return $this->updateQuery($sql);
    }

    function capnhatmaxacthuc($email, $maxacthuc)
    {
      $sql = "UPDATE nguoidung SET maxacthuc = '$maxacthuc' WHERE  email = '$email'";
      return $this->updateQuery($sql);
    }

    function capnhatthongtin($id_ngd, $email, $ten, $gt, $diachi, $sdt)
    {
      $sql = "UPDATE nguoidung SET email = '$email', tennguoidung = '$ten', gioitinh = '$gt', diachi = '$diachi', sdt = '$sdt' WHERE  id_ngd = '$id_ngd'";
      return $this->updateQuery($sql);
    }

    function search($kw)
    {
      $sql="SELECT * FROM nguoidung where tennguoidung like ?";
      $arr=["%$kw%"];
      return $this->selectQuery($sql, $arr);
    }

    function insert($id_ngd, $tennguoidung, $gt, $email, $password, $sdt, $diachi, $hd ='1' , $ad = '0', $mxt ='0')
    { 
      
      $sql="INSERT INTO nguoidung values ('$id_ngd', '$tennguoidung', '$gt', '$email', '$password', '$sdt', '$diachi', '$hd', '$ad' , '$mxt')";
      
      return $this->updateQuery($sql);
    }

}
?>