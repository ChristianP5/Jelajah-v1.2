<?php

if(isset($_GET['workshop_image_id']) && $_GET['workshop_image_id'] != ""){
    // Get Workshop's Information
    $get_queried_workshop_image_id = $_GET['workshop_image_id'];

    $get_workshop_image_info_sql = "SELECT * FROM tb_workshop_images WHERE workshop_image_id = ?;";
    $get_workshop_image_info_stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($get_workshop_image_info_stmt, $get_workshop_image_info_sql)){
        // Statement Failed
        $_SESSION['user-login'] = "<p style='color: red;'>Something Went Wrong.</p>";
        $_SESSION['logged_in'] = "";
        unset($_SESSION['logged_in']);
        echo "<script type='text/javascript'>window.location.href='login.php';</script>";
        die();
    }else{
        // Statement Success
        mysqli_stmt_bind_param($get_workshop_image_info_stmt, "s", $get_queried_workshop_image_id);
        mysqli_stmt_execute($get_workshop_image_info_stmt);

        $get_workshop_image_info_res = mysqli_stmt_get_result($get_workshop_image_info_stmt);
        $get_workshop_image_info_count = mysqli_num_rows($get_workshop_image_info_res);
        

        if($get_workshop_image_info_count != 1){
            $_SESSION['user-login'] = "<p style='color: red;'>Please Login First.</p>";
            unset($_SESSION['logged_in']);
            echo "<script type='text/javascript'>window.location.href='login.php';</script>";
            die();
        }

        // Get Workshop Data
        $get_workshop_image_info_row = mysqli_fetch_assoc($get_workshop_image_info_res);

        $get_workshop_image_info_workshop_image_id = $get_workshop_image_info_row['workshop_image_id'];
        $get_workshop_image_info_workshop_id = $get_workshop_image_info_row['workshop_id'];
        $get_workshop_image_info_workshop_image = $get_workshop_image_info_row['workshop_image'];
    }
}else{
    unset($_SESSION['logged_in']);
    echo "<script type='text/javascript'>window.location.href='./login.php';</script>";
    die();
}
?>