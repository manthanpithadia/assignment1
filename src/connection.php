<?php
header('Access-Control-Allow-Origin: *');
 $con=mysqli_connect("localhost","root","")or exit("Database not connected");
 mysqli_select_db($con,"ShoppingDB");
?>
