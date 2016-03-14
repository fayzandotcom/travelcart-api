<?php

error_reporting(0);

require './Slim/Slim.php';
require './classes/ServiceMethods.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

/* User API */

// get user
$app->post('/user/get', function() use ($app){
    $req = $app->request();
    $email = $req->post('email');
    $password = $req->post('password');
    $service = new ServiceMethods();
    $service->getUser($email, $password);
});

// create user
$app->post('/user/create', function() use ($app){
    $req = $app->request();
    $arrUser = array();
    $arrUser['email'] = $req->post('email');
    $arrUser['password'] = $req->post('password');
    $arrUser['name'] = $req->post('name');
    $arrUser['role'] = $req->post('role');
    $service = new ServiceMethods();
    $service->createUser($arrUser);
});

// edit user
$app->post('/user/edit', function() use ($app){
    $req = $app->request();
    $arrUser = array();
    $arrUser['id'] = $req->post('id');
    $arrUser['name'] = $req->post('name');
    $arrUser['role'] = $req->post('role');
    $service = new ServiceMethods();
    $service->editUser($arrUser);
});

// delete user
$app->get('/user/delete/:id', function($id){
    $service = new ServiceMethods();
    $service->deleteUser($id);
});

// change password
$app->post('/user/change/password', function() use ($app){
    $req = $app->request();
    $email = $req->post('email');
    $password = $req->post('password');
    $service = new ServiceMethods();
    $service->changePassword($email, $password);
});

/* Product API*/

// get all products
$app->get('/products', function(){
    $service = new ServiceMethods();
    $service->getProducts();
});

// get product by id
$app->get('/product/:id', function($id){
    $service = new ServiceMethods();
    $service->getProduct($id);
});

// get product by start and end date
$app->get('/product/date/:start/:end', function($start, $end){
    $service = new ServiceMethods();
    $service->getProductByDate($start, $end);
});

// delete product by id
$app->get('/product/delete/id/:id', function($id){
    $service = new ServiceMethods();
    $service->deleteProductById($id);
});

// edit product by id
$app->post('/product/edit', function() use ($app){
    $req = $app->request();
    $arrProduct = array();
    $arrProduct['id'] = $req->post('id');
    $arrProduct['name'] = $req->post('name');
    $arrProduct['desc'] = $req->post('desc');
    $arrProduct['price'] = $req->post('price');
    $arrProduct['image'] = $req->post('image');
    $arrProduct['date'] = $req->post('date');
    $arrProduct['days'] = $req->post('days');
    $arrProduct['nights'] = $req->post('nights');
    $service = new ServiceMethods();
    $service->editProduct($arrProduct);
});

// create product
$app->post('/product/create', function() use ($app){
    $req = $app->request();
    $arrProduct = array();
    $arrProduct['name'] = $req->post('name');
    $arrProduct['desc'] = $req->post('desc');
    $arrProduct['price'] = $req->post('price');
    $arrProduct['image'] = $req->post('image');
    $arrProduct['date'] = $req->post('date');
    $arrProduct['days'] = $req->post('days');
    $arrProduct['nights'] = $req->post('nights');
    $service = new ServiceMethods();
    $service->createProduct($arrProduct);
});

/* Order API */

// get all orders
$app->get('/orders', function(){
    $service = new ServiceMethods();
    $service->getOrders();
});

// get order by id
$app->get('/order/:id', function($id){
    $service = new ServiceMethods();
    $service->getOrderById($id);
});

// get order by status
$app->get('/order/status/:status', function($status){
    $service = new ServiceMethods();
    $service->getOrderByStatus($status);
});

// get order by userid
$app->get('/order/user/:userId', function($userId){
    $service = new ServiceMethods();
    $service->getOrderByUserId($userId);
});

// delete order by id
$app->get('/order/delete/id/:id', function($id){
    $service = new ServiceMethods();
    $service->deleteOrderById($id);
});

// create order
$app->post('/order/create', function() use ($app){
    $req = $app->request();
    $arrOrder = array();
    $arrOrder['date'] = $req->post('date');
    $arrOrder['p_name'] = $req->post('p_name');
    //$arrOrder['p_desc'] = $req->post('p_desc');
    $arrOrder['p_price'] = $req->post('p_price');
    //$arrOrder['p_image'] = $req->post('p_image');
    //$arrOrder['p_date'] = $req->post('p_date');
    //$arrOrder['p_days'] = $req->post('p_days');
    //$arrOrder['p_nights'] = $req->post('p_nights');
    $arrOrder['p_quantity'] = $req->post('p_quantity');
    $arrOrder['u_id'] = $req->post('u_id');
    $arrOrder['status'] = $req->post('status');
    $service = new ServiceMethods();
    $service->createOrder($arrOrder);
});

// edit order by id
$app->post('/order/edit', function() use ($app){
    $req = $app->request();
    $arrOrder = array();
    $arrOrder['id'] = $req->post('id');
    $arrOrder['date'] = $req->post('date');
    $arrOrder['p_name'] = $req->post('p_name');
    //$arrOrder['p_desc'] = $req->post('p_desc');
    $arrOrder['p_price'] = $req->post('p_price');
    //$arrOrder['p_image'] = $req->post('p_image');
    //$arrOrder['p_date'] = $req->post('p_date');
    //$arrOrder['p_days'] = $req->post('p_days');
    //$arrOrder['p_nights'] = $req->post('p_nights');
    $arrOrder['p_quantity'] = $req->post('p_quantity');
    $arrOrder['u_id'] = $req->post('u_id');
    $arrOrder['status'] = $req->post('status');
    $service = new ServiceMethods();
    $service->editOrder($arrOrder);
});

// change order status
$app->post('/order/change/status', function() use ($app){
    $req = $app->request();
    $id = $req->post('id');
    $status = $req->post('status');
    $service = new ServiceMethods();
    $service->changeOrderStatus($id, $status);
});

/* Comment API */

// get all comments
$app->get('/comments', function(){
    $service = new ServiceMethods();
    $service->getComments();
});

// get comment by id
$app->get('/comment/:id', function($id){
    $service = new ServiceMethods();
    $service->getCommentById($id);
});

// get comment by userid
$app->get('/comment/user/:userId', function($userId){
    $service = new ServiceMethods();
    $service->getCommentByUserId($userId);
});

// delete comment by id
$app->get('/comment/delete/id/:id', function($id){
    $service = new ServiceMethods();
    $service->deleteCommentById($id);
});

// create comment
$app->post('/comment/create', function() use ($app){
    $req = $app->request();
    $arrComment = array();
    $arrComment['date'] = $req->post('date');
    $arrComment['u_id'] = $req->post('u_id');
    $arrComment['type'] = $req->post('type');
    $arrComment['desc'] = $req->post('desc');
    $service = new ServiceMethods();
    $service->createComment($arrComment);
});

// edit comment by id
$app->post('/comment/edit', function() use ($app){
    $req = $app->request();
    $arrComment = array();
    $arrComment['id'] = $req->post('id');
    $arrComment['date'] = $req->post('date');
    $arrComment['u_id'] = $req->post('u_id');
    $arrComment['type'] = $req->post('type');
    $arrComment['desc'] = $req->post('desc');
    $service = new ServiceMethods();
    $service->editComment($arrComment);
});


$app->run();
