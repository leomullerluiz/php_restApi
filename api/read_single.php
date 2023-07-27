<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once('../core/initialize.php');

    $product = new Product($db);

    $product->id = isset($_GET['id']) ? $_GET['id'] : die();


    if($product->read_single()){
        $product_arr = array(
            'message' => 'Success',
            'id' => $product->id,
            'name' => $product->name
        );
    }else{
        $product_arr = array(
            'message' => 'No products found'
        );
    }

    print_r(json_encode($product_arr));
