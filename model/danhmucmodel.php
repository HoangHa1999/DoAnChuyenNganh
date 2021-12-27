<?php
class danhmucmodel extends Db
{
    function all()
    {
     return $this->selectQuery('SELECT * FROM danhmuc');
    }

    function search($kw)
    {
      $sql="SELECT * FROM danhmuc where id_dm like ?";
      $arr=["%kw%"];
      return $this->selectQuery($sql, $arr);
    }

}
?>