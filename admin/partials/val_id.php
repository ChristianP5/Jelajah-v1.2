<?php

// Is there a Queried User ID?
if(!isset($_GET['user_id'])){
    echo "<script type='text/javascript'>window.location.href='view-user.php';</script>";    
    die();    
}

// Is it a Valid Queried User ID?
$val_id_sql = "SELECT * FROM tb_user WHERE user_id = '".$_GET['user_id']."'";
$val_id_res = mysqli_query($conn, $val_id_sql);

if($val_id_res == TRUE){
    $val_id_count = mysqli_num_rows($val_id_res);
    if($val_id_count != 1){
        echo "<script type='text/javascript'>window.location.href='view-user.php';</script>";    
        die();  
    }

    
}

?>