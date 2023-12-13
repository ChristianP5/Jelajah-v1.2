<?php
$_SESSION['logged_in'] = "";
unset($_SESSION['last-action']);
unset($_SESSION['logged_in']);
echo "<script type='text/javascript'>window.location.href='login.php';</script>";
?>