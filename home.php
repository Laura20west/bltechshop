<?php
session_start();

include 'connection.php';

if(isset($_SESSION['user']))
{

    if($_SESSION['type']==0)
    {
        echo $_SESSION['user'] .'this is user';
    
    }
    if($_SESSION['type']==1){
        echo $_SESSION['user']. 'this is admin';
    }
}
?>