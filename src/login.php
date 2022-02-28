<?php
//http://localhost/assignment1/src/login.php?email=%22demo@gmail.com%22&pass=%22abcd1234%22
    include "connection.php";
   
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];


    $sql="select * from user where email=$email and password=$pass";
    $q=mysqli_query($con,$sql);

    if(mysqli_num_rows($q)>0)
    {        
        print(json_encode("login success"));
    }
    else
    {
        print(json_encode("login failed"));
    }
?>
