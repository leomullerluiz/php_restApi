<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../core/initialize.php');

    $product = new Product($db);

    $data = json_decode(file_get_contents("php://input"));

    $product->id = $data->id;

    if($product->delete()){
        echo json_encode(array('message' => 'Product Deleted'));
    }else{
        echo json_encode(array('message' => 'Error'));
    }