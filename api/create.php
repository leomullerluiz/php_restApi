<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../core/initialize.php');


    $product = new Product($db);

    $data = json_decode(file_get_contents("php://input"));

    $product->name = $data->name;

    if($product->create()){
        echo json_encode(array('message' => 'Product created'));
    }else{
        echo json_encode(array('message' => 'Error'));
    }