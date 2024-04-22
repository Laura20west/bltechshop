<?php
require("connection.php");
if(isset($_POST['user_delete'])){
    $id=$_POST['user_delete'];

    $query="DELETE FROM `blorders` WHERE `blorders`.`id` = $id";
    $query_run= mysqli_query($conn, $query); 

    if($query_run){
        echo "success";
        header("location: shop.php");
        
        
    }
    else{
        
        echo "error";
    }
    
}
?>



<?php


if(isset($_POST['user_delete'])){
    $emailname=$_POST['emailname'];
    
    $conn=new mysqli('localhost', 'root', '','bltech');
if($conn-> connect_error){
    die('connection failed :' .$conn-> connect_error);
}else{
    $stmt=$conn->prepare("insert into blpay(emailname)
    values(?)");
    $stmt->bind_param("s", $emailname);
    $stmt-> execute();
    
    $stmt ->close();
    $conn->close();

}
}

?>
<?php

if(isset($_POST['log_in'])){
    $id=$_POST['log_in'];

    $query="DELETE FROM `blorders` WHERE `blorders`.`id` = $id";
    $query_run= mysqli_query($conn, $query); 

    if($query_run){
        echo "success";
        header("location: index.php");
        
        
    }
    else{
        
        echo "error";
    }
    
}
?>

<?php

    if(isset($_POST['welcome'])){
        header("location: index.php");
}
?>