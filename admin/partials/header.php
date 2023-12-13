<?php
include('../admin/dbconn/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./css/main.css" />
  </head>
  <body>
    <!-- Header Start -->
    <header class="">
      <h1>Jelajah Admin Panel</h1>
      <ul>
        <li class="nav-home"><a href="./dashboard.php">Home</a></li>
        <li><a href="<?php echo $SITEURL.'view-user.php';?>">User</a></li>
        <li><a href="<?php echo $SITEURL.'view-workshop.php';?>">Wokshop</a></li>
        <li><a class="button-red" href="<?php echo $SITEURL.'logout.php';?>">Logout</a></li>
      </ul>
    </header>
    <!-- Header End -->