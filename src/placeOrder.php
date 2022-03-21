<?php
    //http://localhost/assignment1/src/placeOrder.php?product=%22abcd%22&qty=2&total=36
    include "connection.php";
   
    $product = $_REQUEST['product'];
    $qty = $_REQUEST['qty'];    
    $total = $_REQUEST['total'];


    $sql = "INSERT INTO `order`(`product`, `qty`, `total`) VALUES ($product,$qty,$total)";

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
