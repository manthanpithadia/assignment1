<?php
    //http://localhost/assignment1/src/addComment.php?cid=1&product=%22abcd%22&user=%22manthan%22&rating=2&image=%22imgURL%22&text=%22commentText%22
    include "connection.php";
   
    $cid = $_REQUEST['cid'];
    $product = $_REQUEST['product'];    
    $user = $_REQUEST['user'];
    $rating = $_REQUEST['rating'];
    $image = $_REQUEST['image'];
    $text = $_REQUEST['text'];


    $sql = "INSERT INTO `comments`(`CID`, `product`, `user`, `rating`, `image`, `text`) 
    VALUES ($cid,$product,$user,$rating,$image,$text)";

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
