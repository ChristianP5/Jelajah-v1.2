<?php
include('../dbconn/connection.php');
include('../partials/get-user-data.php');

function invalid_redirect_add_wishlist_item(): void{
    echo "<script type='text/javascript'>window.location.href='../workshops.php';</script>";
    die();
}

function valid_redirect_add_wishlist_item(): void{
    $input_workshop_id = $_GET['workshop_id'];
    echo "<script type='text/javascript'>window.history.back();</script>";
    die();
}

// Check if there is input
if(!isset($_GET['workshop_id']) || $_GET['workshop_id'] == ""){
    // No Input
    invalid_redirect_add_wishlist_item();
}

$input_workshop_id = $_GET['workshop_id'];


// Check if workshop_id is valid
$check_valid_workshop_sql = "SELECT * FROM tb_workshop WHERE workshop_id = '$input_workshop_id' AND workshop_isActive = 'True'
;";
$check_valid_workshop_res = mysqli_query($conn, $check_valid_workshop_sql);
$check_valid_workshop_count = mysqli_num_rows($check_valid_workshop_res);
if($check_valid_workshop_count != 1){
    // No Workshop ID Found
    invalid_redirect_add_wishlist_item();
}

// Add Workshop to Wishlist
$insert_workshop_to_wishlist_sql = "INSERT INTO tb_user_wishlist SET
workshop_id = '$input_workshop_id',
user_id = '$get_user_info_user_id'
;";

$insert_workshop_to_wishlist_res = mysqli_query($conn, $insert_workshop_to_wishlist_sql);
if($insert_workshop_to_wishlist_res == TRUE){
    valid_redirect_add_wishlist_item();
}

?>