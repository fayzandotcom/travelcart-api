<?php

Class User {
    
    private $id;
    private $email;
    private $password;
    private $name;
    private $role;
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($value){
        $this->id = $value;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($value){
        $this->email = $value;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function setPassword($value){
        $this->password = $value;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function setName($value){
        $this->name = $value;
    }
    
    public function getRole(){
        return $this->role;
    }
    
    public function setRole($value){
        $this->role = $value;
    }
    
    public function toArray(){
        $array = array();
        $array['id'] = $this->id;
        $array['email'] = $this->email;
        $array['password'] = $this->password;
        $array['name'] = $this->name;
        $array['role'] = $this->role;
        return $array;
    }
}

