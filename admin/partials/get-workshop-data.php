<?php

if(isset($_GET['workshop_id']) && $_GET['workshop_id'] != ""){
    // Get Workshop's Information
    $get_queried_workshop_id = $_GET['workshop_id'];

    $get_workshop_info_sql = "SELECT tb_workshop.* FROM tb_workshop WHERE workshop_id = ?;";
    $get_workshop_info_stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($get_workshop_info_stmt, $get_workshop_info_sql)){
        // Statement Failed
        $_SESSION['user-login'] = "<p style='color: red;'>Something Went Wrong.</p>";
        $_SESSION['logged_in'] = "";
        unset($_SESSION['logged_in']);
        session_destroy();
        echo "<script type='text/javascript'>window.location.href='login.php';</script>";
        die();
    }else{
        // Statement Success
        mysqli_stmt_bind_param($get_workshop_info_stmt, "s", $get_queried_workshop_id);
        mysqli_stmt_execute($get_workshop_info_stmt);

        $get_workshop_info_res = mysqli_stmt_get_result($get_workshop_info_stmt);
        $get_workshop_info_count = mysqli_num_rows($get_workshop_info_res);
        

        if($get_workshop_info_count != 1){
            $_SESSION['user-login'] = "<p style='color: red;'>Please Login First.</p>";
            $_SESSION['logged_in'] = "";
            unset($_SESSION['logged_in']);
            session_destroy();
            echo "<script type='text/javascript'>window.location.href='login.php';</script>";
            die();
        }

        // Get Workshop Data
        $get_workshop_info_row = mysqli_fetch_assoc($get_workshop_info_res);

        $get_workshop_info_workshop_id = $get_queried_workshop_id;
        $get_workshop_info_workshop_name = $get_workshop_info_row['workshop_name'];
        $get_workshop_info_workshop_addr = $get_workshop_info_row['workshop_addr'];
        $get_workshop_info_workshop_duration = $get_workshop_info_row['workshop_duration'];
        $get_workshop_info_workshop_date = $get_workshop_info_row['workshop_date'];
        $get_workshop_info_workshop_time = $get_workshop_info_row['workshop_time'];
        $get_workshop_info_workshop_desc_l = $get_workshop_info_row['workshop_desc_l'];
        $get_workshop_info_workshop_desc_g = $get_workshop_info_row['workshop_desc_g'];
        $get_workshop_info_workshop_price = $get_workshop_info_row['workshop_price'];
        $get_workshop_info_workshop_isActive = $get_workshop_info_row['workshop_isActive'];
    }
}else{
    unset($_SESSION['logged_in']);
    echo "<script type='text/javascript'>window.location.href='./login.php';</script>";
    die();
}
?>