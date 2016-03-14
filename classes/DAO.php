<?php

class DAO {
    
    private $dataConn;
    
    function __construct() {
        $this->dataConn = new DataConn();
    }
    
    /* User DAO */
    
    function getUserByEmailPassword($email, $password){
        //$dataConn = new DataConn();
        $query = "SELECT `id`,`email`, `name`, `role` FROM user WHERE email='$email' and password=Password('$password')";
        $this->dataConn->connect();
        $result = $this->dataConn->execQuery($query);
        
        $user = new User();
        while($data = mysql_fetch_array($result)) {
            $user->setId($data['id']);
            $user->setEmail($data['email']);
            $user->setName($data['name']);
            $user->setRole($data['role']);
        }
        $this->dataConn->disconnect();
        return $user;
    }

    function addUser(User $user){
        //$dataConn = new DataConn();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $name = $user->getName();
        $role = $user->getRole();
        $query = "INSERT INTO `user`(`email`, `password`, `name`, `role`) VALUES ('$email', Password('$password'), '$name', '$role')";
        $this->dataConn->connect();
        $result = $this->dataConn->insertQuery($query);
        $this->dataConn->disconnect();
        return $result;
    }
    
    function updateUser(User $user){
        $id = $user->getId();
        $name = $user->getName();
        $role = $user->getRole();
        $query = "UPDATE `user` SET `name`='$name',`role`='$role' WHERE `id`=$id";
        $this->dataConn->connect();
        $result = $this->dataConn->updateQuery($query);
        $this->dataConn->disconnect();
        return $result;
    }
    
    function deleteUser($id){
        //$dataConn = new DataConn();
        $query = "DELETE FROM `user` WHERE `id`=$id";
        $this->dataConn->connect();
        $result = $this->dataConn->deleteQuery($query);
        $this->dataConn->disconnect();
        return $result;
    }
    
    function changePassword(User $user){
        //$dataConn = new DataConn();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $query = "UPDATE `user` SET `password`=Password('$password') WHERE `email`='$email'";
        $this->dataConn->connect();
        $result = $this->dataConn->updateQuery($query);
        $this->dataConn->disconnect();
        return $result;
    }
    
    /* End User DAO */
    
    /* Product DAO */
    
    function getProducts(){
        $query = "SELECT * FROM product";
        $this->dataConn->connect();
        $result = $this->dataConn->execQuery($query);
        $this->dataConn->disconnect();
        $output = array();
        while($data = mysql_fetch_array($result)) {
            $output[] = $data;
        }
        return $output;
    }

    function getProductById($id){
        $query = "SELECT * FROM product WHERE id=$id";
        $this->dataConn->connect();
        $result = $this->dataConn->execQuery($query);
        $this->dataConn->disconnect();
        $output = array();
        while($data = mysql_fetch_array($result)) {
            $output[] = $data;
        }
        return $output;
    }
    
    function getProductByDate($startDate, $endDate){
        $query = "SELECT * FROM product WHERE date BETWEEN '$startDate' AND '$endDate'";
        $this->dataConn->connect();
        $result = $this->dataConn->execQuery($query);
        $this->dataConn->disconnect();
        $output = array();
        while($data = mysql_fetch_array($result)) {
            $output[] = $data;
        }
        return $output;
    }
    
    function deleteProductById($id){
        $query = "DELETE FROM product WHERE id=$id";
        $this->dataConn->connect();
        $result = $this->dataConn->deleteQuery($query);
        $this->dataConn->disconnect();
        return $result;
    }
    
    function updateProduct(Product $product){
        $id = $product->getId();
        $name = $product->getName();
        $desc = $product->getDesc();
        $price = $product->getPrice();
        $image = $product->getImage();
        $date = $product->getDate();
        $days = $product->getDays();
        $nights = $product->getNights();
        
        $query = "UPDATE `product` SET `name`='$name',`description`='$desc',`price`=$price,`image`='$image',`date`='$date',`days`=$days,`nights`=$nights WHERE `id`=$id";
        $this->dataConn->connect();
        $result = $this->dataConn->updateQuery($query);
        $this->dataConn->disconnect();
        return $result;
    }
    
    function addProduct(Product $product){
        $name = $product->getName();
        $desc = $product->getDesc();
        $price = $product->getPrice();
        $image = $product->getImage();
        $date = $product->getDate();
        $days = $product->getDays();
        $nights = $product->getNights();
        
        $query = "INSERT INTO `product`(`name`, `description`, `price`, `image`, `date`, `days`, `nights`) VALUES ('$name', '$desc', $price, '$image', '$date', $days, $nights)";
        $this->dataConn->connect();
        $result = $this->dataConn->insertQuery($query);
        $this->dataConn->disconnect();
        return $result;
    }
    
    /* END Product DAO */
    
    /* Order DA0 */
    
    function getOrders(){
        /*$query = "SELECT `order`.`id`,`order`.`date`,`order`.`p_name`,`order`.`p_description`,`order`.`p_price`,`order`.`p_image`,`order`.`p_date`,
                `order`.`p_days`,`order`.`p_nights`,`order`.`p_quantity`,`order`.`status`,`user`.`email`,`user`.`name`
                FROM `order`
                INNER JOIN `user` ON `order`.`u_id`=`user`.`id`";*/
        $query = "SELECT `order`.`id`,`order`.`date`,`order`.`p_name`,`order`.`p_price`,
                `order`.`p_quantity`,`order`.`status`,`user`.`email`,`user`.`name`
                FROM `order`
                INNER JOIN `user` ON `order`.`u_id`=`user`.`id` ORDER BY `order`.`status`";
        $this->dataConn->connect();
        $result = $this->dataConn->execQuery($query);
        $this->dataConn->disconnect();
        $output = array();
        while($data = mysql_fetch_array($result)) {
            $output[] = $data;
        }
        return $output;
    }
    
    function getOrderById($id){
        /*$query = "SELECT `order`.`id`,`order`.`date`,`order`.`p_name`,`order`.`p_description`,`order`.`p_price`,`order`.`p_image`,`order`.`p_date`,
                `order`.`p_days`,`order`.`p_nights`,`order`.`p_quantity`,`order`.`status`,`user`.`email`,`user`.`name`
                FROM `order`
                INNER JOIN `user` ON `order`.`u_id`=`user`.`id`
                WHERE `order`.`id`=$id";*/
        $query = "SELECT `order`.`id`,`order`.`date`,`order`.`p_name`,`order`.`p_price`,
                `order`.`p_quantity`,`order`.`status`,`user`.`email`,`user`.`name`
                FROM `order`
                INNER JOIN `user` ON `order`.`u_id`=`user`.`id`
                WHERE `order`.`id`=$id";
        $this->dataConn->connect();
        $result = $this->dataConn->execQuery($query);
        $this->dataConn->disconnect();
        $output = array();
        while($data = mysql_fetch_array($result)) {
            $output[] = $data;
        }
        return $output;
    }
    
    function getOrderByStatus($status){
        /*$query = "SELECT `order`.`id`,`order`.`date`,`order`.`p_name`,`order`.`p_description`,`order`.`p_price`,`order`.`p_image`,`order`.`p_date`,
                `order`.`p_days`,`order`.`p_nights`,`order`.`p_quantity`,`order`.`status`,`user`.`email`,`user`.`name`
                FROM `order`
                INNER JOIN `user` ON `order`.`u_id`=`user`.`id`
                WHERE `order`.`status`=$status";*/
        $query = "SELECT `order`.`id`,`order`.`date`,`order`.`p_name`,`order`.`p_price`,
                `order`.`p_quantity`,`order`.`status`,`user`.`email`,`user`.`name`
                FROM `order`
                INNER JOIN `user` ON `order`.`u_id`=`user`.`id`
                WHERE `order`.`status`=$status";
        $this->dataConn->connect();
        $result = $this->dataConn->execQuery($query);
        $this->dataConn->disconnect();
        $output = array();
        while($data = mysql_fetch_array($result)) {
            $output[] = $data;
        }
        return $output;
    }
    
    function getOrderByUserId($userId){
        /*$query = "SELECT `order`.`id`,`order`.`date`,`order`.`p_name`,`order`.`p_description`,`order`.`p_price`,`order`.`p_image`,`order`.`p_date`,
                `order`.`p_days`,`order`.`p_nights`,`order`.`p_quantity`,`order`.`status`,`user`.`email`,`user`.`name`
                FROM `order`
                INNER JOIN `user` ON `order`.`u_id`=`user`.`id`
                WHERE `user`.`id`=$userId";*/
        $query = "SELECT `order`.`id`,`order`.`date`,`order`.`p_name`,`order`.`p_price`,
                `order`.`p_quantity`,`order`.`status`,`user`.`email`,`user`.`name`
                FROM `order`
                INNER JOIN `user` ON `order`.`u_id`=`user`.`id`
                WHERE `user`.`id`=$userId ORDER BY `order`.`status`";
        $this->dataConn->connect();
        $result = $this->dataConn->execQuery($query);
        $this->dataConn->disconnect();
        $output = array();
        while($data = mysql_fetch_array($result)) {
            $output[] = $data;
        }
        return $output;
    }
    
    function deleteOrderById($id){
        $query = "DELETE FROM `order` WHERE id=$id";
        $this->dataConn->connect();
        $result = $this->dataConn->deleteQuery($query);
        $this->dataConn->disconnect();
        return $result;
    }
    
    function addOrder(Order $order){
        $date = $order->getDate();
        $p_name = $order->getProductName();
        //$p_desc = $order->getProductDesc();
        $p_price = $order->getProductPrice();
        //$p_image = $order->getProductImage();
        //$p_date = $order->getProductDate();
        //$p_days = $order->getProductDays();
        //$p_nights = $order->getProductNights();
        $p_quantity = $order->getProductQuantity();
        $u_id = $order->getUserId();
        $status = $order->getStatus();
        
        //$query = "INSERT INTO `order`(`date`, `p_name`, `p_description`, `p_price`, `p_image`, `p_date`, `p_days`, `p_nights`, `p_quantity`, `u_id`, `status`) VALUES ('$date', '$p_name', '$p_desc', $p_price, '$p_image', '$p_date', $p_days, $p_nights, $p_quantity, $u_id, $status)";
        $query = "INSERT INTO `order`(`date`, `p_name`, `p_price`, `p_quantity`, `u_id`, `status`) VALUES ('$date', '$p_name', $p_price, $p_quantity, $u_id, $status)";
        $this->dataConn->connect();
        $result = $this->dataConn->insertQuery($query);
        $this->dataConn->disconnect();
        return $result;
    }
    
    function updateOrder(Order $order){
        $id = $order->getId();
        $date = $order->getDate();
        $p_name = $order->getProductName();
        //$p_desc = $order->getProductDesc();
        $p_price = $order->getProductPrice();
        //$p_image = $order->getProductImage();
        //$p_date = $order->getProductDate();
        //$p_days = $order->getProductDays();
        //$p_nights = $order->getProductNights();
        $p_quantity = $order->getProductQuantity();
        $uid = $order->getUserId();
        $status = $order->getStatus();
        
        //$query = "UPDATE `order` SET `date`='$date',`p_name`='$p_name',`p_description`='$p_desc',`p_price`=$p_price,`p_image`='$p_image',`p_date`='$p_date',`p_days`=$p_days,`p_nights`=$p_nights, `p_quantity`=$p_quantity,`u_id`=$uid,`status`=$status WHERE `id`=$id";
        $query = "UPDATE `order` SET `date`='$date',`p_name`='$p_name',`p_price`=$p_price,`p_quantity`=$p_quantity,`u_id`=$uid,`status`=$status WHERE `id`=$id";
        $this->dataConn->connect();
        $result = $this->dataConn->updateQuery($query);
        $this->dataConn->disconnect();
        return $result;
    }
    
    function updateOrderStatus($id, $status){
        
        $query = "UPDATE `order` SET `status`=$status WHERE `id`=$id";
        $this->dataConn->connect();
        $result = $this->dataConn->updateQuery($query);
        $this->dataConn->disconnect();
        return $result;
    }
    
    /* END Order DAO */
    
    /* Comment DAO */
    
     function getComments(){
        $query = "SELECT `comment`.`id`,`comment`.`date`,`comment`.`type`,`comment`.`description`,`user`.`email`,`user`.`name`
                FROM `comment`
                INNER JOIN `user` ON `comment`.`u_id`=`user`.`id`";
        $this->dataConn->connect();
        $result = $this->dataConn->execQuery($query);
        $this->dataConn->disconnect();
        $output = array();
        while($data = mysql_fetch_array($result)) {
            $output[] = $data;
        }
        return $output;
    }
    
    function getCommentById($id){
        $query = "SELECT `comment`.`id`,`comment`.`date`,`comment`.`type`,`comment`.`description`,`user`.`email`,`user`.`name`
                FROM `comment`
                INNER JOIN `user` ON `comment`.`u_id`=`user`.`id`
                WHERE `comment`.`id`=$id";
        $this->dataConn->connect();
        $result = $this->dataConn->execQuery($query);
        $this->dataConn->disconnect();
        $output = array();
        while($data = mysql_fetch_array($result)) {
            $output[] = $data;
        }
        return $output;
    }   
    
    function getCommentByUserId($userId){
        $query = "SELECT `comment`.`id`,`comment`.`date`,`comment`.`type`,`comment`.`description`,`user`.`email`,`user`.`name`
                FROM `comment`
                INNER JOIN `user` ON `comment`.`u_id`=`user`.`id`
                WHERE `user`.`id`=$userId";
        $this->dataConn->connect();
        $result = $this->dataConn->execQuery($query);
        $this->dataConn->disconnect();
        $output = array();
        while($data = mysql_fetch_array($result)) {
            $output[] = $data;
        }
        return $output;
    }
    
    function deleteCommentById($id){
        $query = "DELETE FROM comment WHERE id=$id";
        $this->dataConn->connect();
        $result = $this->dataConn->deleteQuery($query);
        $this->dataConn->disconnect();
        return $result;
    }
    
    function addComment(Comment $comment){
        $u_id = $comment->getUserId();
        $date = $comment->getDate();
        $type = $comment->getType();
        $desc = $comment->getDesc();
        
        $query = "INSERT INTO `comment`(`u_id`, `date`, `type`, `description`) VALUES ($u_id, '$date', $type, '$desc')";
        $this->dataConn->connect();
        $result = $this->dataConn->insertQuery($query);
        $this->dataConn->disconnect();
        return $result;
    }
    
    function updateComment(Comment $comment){
        $id = $comment->getId();
        $u_id = $comment->getUserId();
        $date = $comment->getDate();
        $type = $comment->getType();
        $desc = $comment->getDesc();
        
        $query = "UPDATE `comment` SET `u_id`=$u_id,`date`='$date',`type`=$type,`description`='$desc' WHERE `id`=$id";
        $this->dataConn->connect();
        $result = $this->dataConn->updateQuery($query);
        $this->dataConn->disconnect();
        return $result;
    }
    
    /* END Comment DAO */
    
}