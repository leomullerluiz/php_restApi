<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once('../core/initialize.php');

    $product = new Product($db);

    $product->id = isset($_GET['id']) ? $_GET['id'] : die();

    $product_arr = array();
    $product_arr['return'] = array();
    $product_arr['data'] = array();
    

    if($product->read_single()){
        $return_message = array('message' => 'success', 'num_results' => 1); 
        $product_item = array(
            'id' => $product->id,
            'name' => $product->name
        );
        array_push($product_arr['data'], $product_item);
    }else{
        $return_message = array('message' => 'no_result', 'num_results' => 0); 
        array_push($product_arr['data'], array());
    }

    array_push($product_arr['return'], $return_message);
    print_r(json_encode($product_arr));
