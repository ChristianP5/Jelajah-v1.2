<?php

function invalid_redirect_get_workshop_data(): void{
    echo "<script type='text/javascript'>window.location.href='workshops.php';</script>";
    die();
}


// Check if there is Workshop_ID in Query
if(!isset($_GET['workshop_id']) || $_GET['workshop_id'] == ""){
    // No Workshop_ID in Query
    invalid_redirect_get_workshop_data();
}

$input_workshop_id = $_GET['workshop_id'];

// Check if Workshop_ID Exists
$check_workshop_id_sql = "SELECT * FROM tb_workshop WHERE workshop_id = '$input_workshop_id';";
$check_workshop_id_res = mysqli_query($conn, $check_workshop_id_sql);
$check_workshop_id_count = mysqli_num_rows($check_workshop_id_res);
if($check_workshop_id_count != 1){
    // Workshop_ID Doesn't Exists
    invalid_redirect_get_workshop_data();
}

// Get Workshop Data for Workshop_ID
$get_workshop_data_row = mysqli_fetch_assoc($check_workshop_id_res);

$get_workshop_data_workshop_id = $get_workshop_data_row['workshop_id'];
$get_workshop_data_workshop_name = $get_workshop_data_row['workshop_name'];
$get_workshop_data_workshop_addr = $get_workshop_data_row['workshop_addr'];
$get_workshop_data_workshop_duration = $get_workshop_data_row['workshop_duration'];
$get_workshop_data_workshop_date = $get_workshop_data_row['workshop_date'];
$get_workshop_data_workshop_time = $get_workshop_data_row['workshop_time'];
$get_workshop_data_workshop_desc_l = $get_workshop_data_row['workshop_desc_l'];
$get_workshop_data_workshop_desc_g = $get_workshop_data_row['workshop_desc_g'];
$get_workshop_data_workshop_price = $get_workshop_data_row['workshop_price'];
$get_workshop_data_workshop_isActive = $get_workshop_data_row['workshop_isActive'];
$get_workshop_data_workshop_type = $get_workshop_data_row['workshop_type'];

if($get_workshop_data_workshop_isActive != "True"){
    invalid_redirect_get_workshop_data();
}
?>