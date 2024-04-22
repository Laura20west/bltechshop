<?php

    $host="localhost";
    $username="root";
    $password="";
    $database="ecoms";

    $con=mysqli_connect($host, $username, $password, $database);

    if(!$con)
    {
        die("connection failed:" .mysqli_connect_error());
    }else{
        echo "connection successfully";
    }
?>
