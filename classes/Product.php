<?php

class Product {
    
    private $id;
    private $name;
    private $desc;
    private $price;
    private $image;
    private $date;
    private $days;
    private $nights;
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($value){
        $this->id = $value;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function setName($value){
        $this->name = $value;
    }
    
    public function getDesc(){
        return $this->desc;
    }
    
    public function setDesc($value){
        $this->desc = $value;
    }
    
    public function getPrice(){
        return $this->price;
    }
    
    public function setPrice($value){
        $this->price = $value;
    }
    
    public function getImage(){
        return $this->image;
    }
    
    public function setImage($value){
        $this->image = $value;
    }
    
    public function getDate(){
        return $this->date;
    }
    
    public function setDate($value){
        $this->date = $value;
    }
    
    public function getDays(){
        return $this->days;
    }
    
    public function setDays($value){
        $this->days = $value;
    }
    
    public function getNights(){
        return $this->nights;
    }
    
    public function setNights($value){
        $this->nights = $value;
    }
}
