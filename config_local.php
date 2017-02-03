<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$conn=mysqli_connect('localhost', 'root', 'root') or die("DB connect error!");
mysqli_select_db($conn, 'heykorean') or die("DB select error!");

//echo "Connection success!";
?>