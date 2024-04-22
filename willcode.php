<?php
require("connection.php");
if(isset($_POST['user_delete'])){
    $id=$_POST['user_delete'];

    $query="DELETE FROM `blorders` WHERE `blorders`.`id` = $id";
    $query_run= mysqli_query($conn, $query); 

    if($query_run){
        echo "success";
        header("location: adminindex.php");
        
        
    }
    else{
        
        echo "error";
    }
    
}
?>

<?php
require("connection.php");
if(isset($_POST['user_delete'])){
    $id=$_POST['user_delete'];

    $query="DELETE FROM `blpay` WHERE `blpay`.`id` = $id";
    $query_run= mysqli_query($conn, $query); 

    if($query_run){
        echo "success";
        header("location: adminindex.php");
        
        
    }
    else{
        
        echo "error";
    }
    
}
?>
<?php
require("connection.php");
if(isset($_POST['news_delete'])){
    $id=$_POST['news_delete'];

    $query="DELETE FROM `blnews` WHERE `blnews`.`id` = $id";
    $query_run= mysqli_query($conn, $query); 

    if($query_run){
        echo "success";
        header("location: adminindex.php");
        
        
    }
    else{
        
        echo "error";
    }
    
}
?>
<?php
require("connection.php");
if(isset($_POST['users_delete'])){
    $id=$_POST['users_delete'];

    $query="DELETE FROM `blusers` WHERE `blusers`.`id` = $id";
    $query_run= mysqli_query($conn, $query); 

    if($query_run){
        echo "success";
        header("location: adminindex.php");
        
        
    }
    else{
        
        echo "error";
    }
    
}
?>