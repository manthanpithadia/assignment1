<?php
    include "connection.php";
   
    $pid = $_REQUEST['pid'];
    $product = $_REQUEST['product'];
    $qty = $_REQUEST['qty'];
    $user = $_REQUEST['user'];



    $sql = "INSERT INTO `cart`(`PID`, `product`, `quantities`, `user`) 
    VALUES ($pid,$product,$qty,$user)";
    $q=mysqli_query($con,$sql);
    if(!$q)
    {
	$r['result']="Insertion Failed.....";
    print(json_encode($r));
    }
    else
    {
	$r['result']="Insertion Successful.....";
    print(json_encode($r));
    }


?>
