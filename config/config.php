<?php

    
class connectdb
{
    
    private $servername='localhost';
    private $user='exuqekvqbv';
    private $password='WmgHGXWA23';
    private $dbname='exuqekvqbv';
    private $conn;
    
   public function connect()
    {
        $this->conn=null;
        $this->conn=new mysqli($this->servername,$this->user,$this->password,$this->dbname);
        
         if($this->conn->connect_error)
        {
            die("Connection Failed:" .$this->conn->connect_error);
        }
        else
        {
          //  echo "Connection Successfull";
        }
        
        return $this->conn;
        
    }
}
?>