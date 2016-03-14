<?php

class DataConn {
    
    private $conn;
    
    public function connect() {
        require_once './cfg/config.php';
        $conn = mysql_connect($dbHost, $dbUsername, $dbPassword);
        if(!$conn){
            die('Could not connect to database. Error: ' . mysql_error());
        }
        $this->conn = $conn;
        mysql_select_db($dbName);
    }
    
    public function disconnect() {
        mysql_close($this->conn);
    }
    
    public function execQuery($query){
        $retval = mysql_query($query, $this->conn);
        if(!$retval){
          die('Could not get data: ' . mysql_error());
        }
        return $retval;
    }

    public function insertQuery($query){
        $retval = mysql_query($query, $this->conn);
        if(!$retval){
          die('Could not enter data: ' . mysql_error());
        }
        $array = array();
        $array['id'] = mysql_insert_id();
        return $array;
    }
    
    public function updateQuery($query){
        $retval = mysql_query($query, $this->conn);
        $array = array();
        if(!$retval){
          die('Could not update data: ' . mysql_error() );
          $array['status'] = false;
          return $array;
        }
        $array['status'] = true;
        return $array;
    }
    
    public function deleteQuery($query){
        $retval = mysql_query($query, $this->conn);
        if(!$retval){
          die('Could not delete data: ' . mysql_error());
          return false;
        }
        return true;
    }
    
}