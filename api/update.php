<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../core/initialize.php');

    $product = new Product($db);

    $data = json_decode(file_get_contents("php://input"));

    $product->id = $data->id;
    $product->name = $data->name;

    if($product->update()){
        echo json_encode(array('message' => 'Product Updated'));
    }else{
        echo json_encode(array('message' => 'Error'));
    }