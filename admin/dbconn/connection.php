<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "jelajah";

$SITEURL = "../admin/";
$TIMEOUT = 300;

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != ""){
    // If already Logged In
    if(!isset($_SESSION['last-action'])){
        // Time is Not Set
        $_SESSION['last-action'] = time();
    }else{
        // Time is Set
        if(time() - $_SESSION['last-action'] > $TIMEOUT){
            // Session Timeout
            include('logout.php');
            die();
        }else{
            $_SESSION['last-action'] = time();
        }
    }
}else{
    include('logout.php');
    echo "<script type='text/javascript'>window.location.href='login.php';</script>";
    die();

    echo "The Session is ".$_SESSION['logged_in'];
}



$conn = mysqli_connect($server, $username, $password, $database) or die(mysqli_error());

?>