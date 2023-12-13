<?php
session_start();
$server = "localhost";
$username = "jelajah_visitor";
$password = "";
$database = "jelajah";

$SITEURL = "../views/";
$TIMEOUT = 300;




$conn = mysqli_connect($server, $username, $password, $database) or die(mysqli_error());

?>