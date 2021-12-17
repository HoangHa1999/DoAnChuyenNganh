<?php

Class MySQLUtils{

    private $servername;
    private $username;
    private $password;
    private $dbname;
    private static $conn;

    public function __construct(){
      $this->servername = "localhost";
      $this->username = "root";
      $this->password = "";
      $this->dbname = "bannuoc";
      if(self::$conn == NULL){
        $this->connectDB();
      }
      else{
        return self::$conn;
      }
    }

    public function __destruct(){
      $this->servername = "";
      $this->username = "";
      $this->password = "";
      $this->dbname = "";
      self::$conn = NULL;
    }

  public function connectDB(){
    
try {
  self::$conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
  // set the PDO error mode to exception
  self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  self::$conn->query('set names utf8' );
  return self::$conn;
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
}
public function disconnectDB(){
  self::$conn = NULL;
}

public function updateQuery($sql, $arr=[])
    {
        $stm = self::$conn->prepare($sql);
        $stm->execute($arr);
        return $stm->rowCount();
    }

public function selectQuery($sql, $arr=[])
    {
        $stm = self::$conn->prepare($sql);
        $stm->execute($arr);
        return $stm->fetchAll(PDO::FETCH_ASSOC);//ARRAY
    }

}



?>

