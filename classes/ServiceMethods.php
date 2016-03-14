<?php

require_once './classes/Product.php';
require_once './classes/User.php';
require_once './classes/Order.php';
require_once './classes/Comment.php';
require_once './classes/DAO.php';
require_once './classes/DataConn.php';

class ServiceMethods {
    
    private $dao;
    
    function __construct() {
        $this->dao = new DAO();
    }
    
    /* User methods */
    
    function getUser($email, $password){
        try{
            $user = $this->dao->getUserByEmailPassword($email, $password);
            $json = json_encode($user->toArray());
            echo $json;
        } catch (Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function createUser($arrUser){
        try{
            $user = new User();
            $user->setEmail($arrUser['email']);
            $user->setPassword($arrUser['password']);
            $user->setName($arrUser['name']);
            $user->setRole($arrUser['role']);
            
            $output = $this->dao->addUser($user);
            $json = json_encode($output);
            echo $json;
        } catch (Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function editUser($arrUser){
        try{
            $user = new User();
            $user->setId($arrUser['id']);
            $user->setName($arrUser['name']);
            $user->setRole($arrUser['role']);
            
            $output = $this->dao->updateUser($user);
            $json = json_encode($output);
            echo $json;
        } catch (Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function deleteUser($id){
        try{
            $output = $this->dao->deleteUser($id);
            $json = json_encode($output);
            echo $json;
        } catch (Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function changePassword($email, $password){
        try{
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);
            $output = $this->dao->changePassword($user);
            $json = json_encode($output);
            echo $json;
        } catch (Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    /* End User methods */
    
    /* Product methods */
    
    function getProducts(){
        try {
            $output = $this->dao->getProducts();
            $json = json_encode($output);
            echo $json;
        } catch(Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function getProduct($id){
        try {
            $output = $this->dao->getProductById($id);
            $json = json_encode($output);
            echo $json;
        } catch(Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function getProductByDate($startDate, $endDate){
        try {
            $output = $this->dao->getProductByDate($startDate, $endDate);
            $json = json_encode($output);
            echo $json;
        } catch(Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function deleteProductById($id){
        try {
            $output = $this->dao->deleteProductById($id);
            $json = json_encode($output);
            echo $json;
        } catch(Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function editProduct($arrProduct){
        try{
            $product = new Product();
            $product->setId($arrProduct['id']);
            $product->setName($arrProduct['name']);
            $product->setDesc($arrProduct['desc']);
            $product->setPrice($arrProduct['price']);
            $product->setImage($arrProduct['image']);
            $product->setDate($arrProduct['date']);
            $product->setDays($arrProduct['days']);
            $product->setNights($arrProduct['nights']);
            
            $output = $this->dao->updateProduct($product);
            $json = json_encode($output);
            echo $json;
        } catch (Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function createProduct($arrProduct){
        try{
            $product = new Product();
            $product->setName($arrProduct['name']);
            $product->setDesc($arrProduct['desc']);
            $product->setPrice($arrProduct['price']);
            $product->setImage($arrProduct['image']);
            $product->setDate($arrProduct['date']);
            $product->setDays($arrProduct['days']);
            $product->setNights($arrProduct['nights']);
            
            $output = $this->dao->addProduct($product);
            $json = json_encode($output);
            echo $json;
        } catch (Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    /* End Product methods */
    
    /* Order methods */
    
    function getOrders(){
        try {
            $output = $this->dao->getOrders();
            $json = json_encode($output);
            echo $json;
        } catch(Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function getOrderById($id){
        try {
            $output = $this->dao->getOrderById($id);
            $json = json_encode($output);
            echo $json;
        } catch(Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function getOrderByStatus($status){
        try {
            $output = $this->dao->getOrderByStatus($status);
            $json = json_encode($output);
            echo $json;
        } catch(Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function getOrderByUserId($userId){
        try {
            $output = $this->dao->getOrderByUserId($userId);
            $json = json_encode($output);
            echo $json;
        } catch(Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function deleteOrderById($id){
        try {
            $output = $this->dao->deleteOrderById($id);
            $json = json_encode($output);
            echo $json;
        } catch(Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function createOrder($arrOrder){
        try{
            $order = new Order();
            $order->setDate($arrOrder['date']);
            $order->setProductName($arrOrder['p_name']);
            //$order->setProductDesc($arrOrder['p_desc']);
            $order->setProductPrice($arrOrder['p_price']);
            //$order->setProductImage($arrOrder['p_image']);
            //$order->setProductDate($arrOrder['p_date']);
            //$order->setProductDays($arrOrder['p_days']);
            //$order->setProductNights($arrOrder['p_nights']);
            $order->setProductQuantity($arrOrder['p_quantity']);
            $order->setUserId($arrOrder['u_id']);
            $order->setStatus($arrOrder['status']);
            
            $output = $this->dao->addOrder($order);
            $json = json_encode($output);
            echo $json;
        } catch (Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function editOrder($arrOrder){
        try{
            $order = new Order();
            $order->setId($arrOrder['id']);
            $order->setDate($arrOrder['date']);
            $order->setProductName($arrOrder['p_name']);
            //$order->setProductDesc($arrOrder['p_desc']);
            $order->setProductPrice($arrOrder['p_price']);
            //$order->setProductImage($arrOrder['p_image']);
            //$order->setProductDate($arrOrder['p_date']);
            //$order->setProductDays($arrOrder['p_days']);
            //$order->setProductNights($arrOrder['p_nights']);
            $order->setProductQuantity($arrOrder['p_quantity']);
            $order->setUserId($arrOrder['u_id']);
            $order->setStatus($arrOrder['status']);
            
            $output = $this->dao->updateOrder($order);
            $json = json_encode($output);
            echo $json;
        } catch (Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function changeOrderStatus($id, $status){
        try{
            $output = $this->dao->updateOrderStatus($id, $status);
            $json = json_encode($output);
            echo $json;
        } catch (Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    /* End Order methods */
    
    /* Comment methods */
    
    function getComments(){
        try {
            $output = $this->dao->getComments();
            $json = json_encode($output);
            echo $json;
        } catch(Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function getCommentById($id){
        try {
            $output = $this->dao->getCommentById($id);
            $json = json_encode($output);
            echo $json;
        } catch(Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function getCommentByUserId($userId){
        try {
            $output = $this->dao->getCommentByUserId($userId);
            $json = json_encode($output);
            echo $json;
        } catch(Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function deleteCommentById($id){
        try {
            $output = $this->dao->deleteCommentById($id);
            $json = json_encode($output);
            echo $json;
        } catch(Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function createComment($arrComment){
        try{
            $comment = new Comment();
            $comment->setDate($arrComment['date']);
            $comment->setUserId($arrComment['u_id']);
            $comment->setType($arrComment['type']);
            $comment->setDesc($arrComment['desc']);
            
            $output = $this->dao->addComment($comment);
            $json = json_encode($output);
            echo $json;
        } catch (Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    function editComment($arrComment){
        try{
            $comment = new Comment();
            $comment->setId($arrComment['id']);
            $comment->setDate($arrComment['date']);
            $comment->setUserId($arrComment['u_id']);
            $comment->setType($arrComment['type']);
            $comment->setDesc($arrComment['desc']);
            
            $output = $this->dao->updateComment($comment);
            $json = json_encode($output);
            echo $json;
        } catch (Exception $e) {
            echo $this->returnError($e->getMessage());
        }
    }
    
    /* End Comment methods */
    
    private function returnError($mesg){
        return '{"error":{"text":'. $mesg .'}}';
    }
}

