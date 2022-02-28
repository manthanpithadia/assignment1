<?php
   header('Access-Control-Allow-Origin: *');
    include "connection.php";

    $id=$_REQUEST['id'];

    $sql="select * from where id=$id";
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
