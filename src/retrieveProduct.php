<?php
   header('Access-Control-Allow-Origin: *');
    include "connection.php";
    $sql="select * from product";
    $q=mysqli_query($con,$sql);

    $rows=array();

    if($q)
    {        
        while(($row=mysqli_fetch_assoc($q))!=null)
        {
        $rows['data'][]=$row;
        }
        print(json_encode($rows));
    }
    else
    {
    echo "try again";
    }
?>
