<?php
    session_start();
    $_SESSION['active-user'] = "";
    unset($_SESSION['active-user']);
    echo "<script type='text/javascript'>window.location.href='login.php';</script>";
?>