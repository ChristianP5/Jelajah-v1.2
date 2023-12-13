<?php

if(isset($_GET['user_id']) && $_GET['user_id'] != ""){
    // Get User's Information
    $get_active_user_id = $_GET['user_id'];

    $get_user_info_sql = "SELECT tb_user.* FROM tb_user WHERE user_id = ?;";
    $get_user_info_stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($get_user_info_stmt, $get_user_info_sql)){
        // Statement Failed
        $_SESSION['user-login'] = "<p style='color: red;'>Something Went Wrong.</p>";
        $_SESSION['logged_in'] = "";
        unset($_SESSION['logged_in']);
        session_destroy();
        echo "<script type='text/javascript'>window.location.href='login.php';</script>";
        die();
    }else{
        // Statement Success
        mysqli_stmt_bind_param($get_user_info_stmt, "s", $get_active_user_id);
        mysqli_stmt_execute($get_user_info_stmt);

        $get_user_info_res = mysqli_stmt_get_result($get_user_info_stmt);
        $get_user_info_row = mysqli_fetch_assoc($get_user_info_res);

        // Get User Data
        $get_user_info_user_id = $get_user_info_row['user_id'];
        $get_user_info_user_name = $get_user_info_row['user_name'];
        $get_user_info_user_pass = $get_user_info_row['user_pass'];
        $get_user_info_user_gender = $get_user_info_row['user_gender'];
        $get_user_info_user_dob = $get_user_info_row['user_dob'];
        $get_user_info_user_email = $get_user_info_row['user_email'];
        $get_user_info_user_phone = $get_user_info_row['user_phone'];
        $get_user_info_user_addr = $get_user_info_row['user_addr'];
        $get_user_info_user_image = $get_user_info_row['user_image'];
        $get_user_info_user_isActive = $get_user_info_row['user_isActive'];
    }
}else{
    unset($_SESSION['logged_in']);
    echo "<script type='text/javascript'>window.location.href='./login.php';</script>";
    die();
}
?>