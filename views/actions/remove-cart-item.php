<?php

include('../dbconn/connection.php');
include('../partials/get-user-data.php');

function invalid_redirect_remove_cart_item(): void{
    echo "<script type='text/javascript'>window.location.href='../workshops.php';</script>";
    die();
}

function valid_redirect_remove_cart_item(): void{
    echo "<script type='text/javascript'>window.location.href='../checkout.php';</script>";
    die();
}

// Check if there is input
if(!isset($_GET['cart_id']) || $_GET['cart_id'] == ""){
    // No Input
    invalid_redirect_remove_cart_item();
}

$input_cart_id = $_GET['cart_id'];

// Check if input is valid for that user
$check_valid_cart_of_user_sql = "SELECT user_cart_id FROM tb_user_cart
WHERE user_id = '$get_user_info_user_id'
AND user_cart_id = '$input_cart_id'
;";

$check_valid_cart_of_user_res = mysqli_query($conn, $check_valid_cart_of_user_sql);
if($check_valid_cart_of_user_res == FALSE){
    echo "Query Failed";
    die();
}
$check_valid_cart_of_user_count = mysqli_num_rows($check_valid_cart_of_user_res);

  

if($check_valid_cart_of_user_count != 1){
    // Invalid Input for that User
    invalid_redirect_remove_cart_item();
}



// Delete Item from User's Cart
$remove_cart_of_user_sql = "DELETE FROM tb_user_cart 
WHERE user_id = '$get_user_info_user_id'
AND user_cart_id = '$input_cart_id'
;";

$remove_cart_of_user_res = mysqli_query($conn, $remove_cart_of_user_sql);
if($remove_cart_of_user_res == TRUE){
    valid_redirect_remove_cart_item();
}


?>