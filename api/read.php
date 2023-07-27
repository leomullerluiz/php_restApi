<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once('../core/initialize.php');

    $product = new Product($db);
    $result = $product->read();
    $num = $result->rowCount();


    $product_arr = array();
    $product_arr['return'] = array();
    $product_arr['data'] = array();

    if($num > 0){
        $return_message = array('message' => 'success', 'num_results' => $num); 
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $product_item = array(
                'id' => $id,
                'name' => $name
            );
            array_push($product_arr['data'], $product_item);
        }
    }else{
        $return_message = array('message' => 'no_result', 'num_results' => 0); 
        array_push($product_arr['data'], array());    
    }
    array_push($product_arr['return'], $return_message);
    print_r(json_encode($product_arr));