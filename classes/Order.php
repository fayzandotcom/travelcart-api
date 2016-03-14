<?php

class Order {
    
    private $id;
    private $date;
    private $productName;
    private $productDesc;
    private $productPrice;
    private $productImage;
    private $productDate;
    private $productDays;
    private $productNights;
    private $productQuantity;
    private $userId;
    private $status;
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($value){
        $this->id = $value;
    }
    
    public function getDate(){
        return $this->date;
    }
    
    public function setDate($value){
        $this->date = $value;
    }
    
    public function getProductName(){
        return $this->productName;
    }
    
    public function setProductName($value){
        $this->productName = $value;
    }
    
    public function getProductDesc(){
        return $this->productDesc;
    }
    
    public function setProductDesc($value){
        $this->productDesc = $value;
    }
    
    public function getProductPrice(){
        return $this->productPrice;
    }
    
    public function setProductPrice($value){
        $this->productPrice = $value;
    }
    
    public function getProductImage(){
        return $this->productImage;
    }
    
    public function setProductImage($value){
        $this->productImage = $value;
    }
    
    public function getProductDate(){
        return $this->productDate;
    }
    
    public function setProductDate($value){
        $this->productDate = $value;
    }
    
    public function getProductDays(){
        return $this->productDays;
    }
    
    public function setProductDays($value){
        $this->productDays = $value;
    }
    
    public function getProductNights(){
        return $this->productNights;
    }
    
    public function setProductNights($value){
        $this->productNights = $value;
    }
    
    public function getProductQuantity(){
        return $this->productQuantity;
    }
    
    public function setProductQuantity($value){
        $this->productQuantity = $value;
    }
    
    public function getUserId(){
        return $this->userId;
    }
    
    public function setUserId($value){
        $this->userId = $value;
    }
    
    public function getStatus(){
        return $this->status;
    }
    
    public function setStatus($value){
        $this->status = $value;
    }
    
}