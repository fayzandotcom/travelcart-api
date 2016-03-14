<?php

class Comment {
    
    private $id;
    private $userId;
    private $date;
    private $type;
    private $desc;
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($value){
        $this->id = $value;
    }
    
    public function getUserId(){
        return $this->userId;
    }
    
    public function setUserId($value){
        $this->userId = $value;
    }
    
    public function getDate(){
        return $this->date;
    }
    
    public function setDate($value){
        $this->date = $value;
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function setType($value){
        $this->type = $value;
    }
    
    public function getDesc(){
        return $this->desc;
    }
    
    public function setDesc($value){
        $this->desc = $value;
    }
}

