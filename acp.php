<?php


if(isset($_POST['add_category_btn'])){
    $name=$_POST['name'];

    
    $apk=$_FILES['apk']['name'];
    
    $path=" ";
    $apk_ext=pathinfo($apk, PATHINFO_EXTENSION);
    $filename=time(). '.'.$apk_ext;

    $image=$_FILES['image']['name'];
    
    $path=" ";
    $image_ext=pathinfo($image, PATHINFO_EXTENSION);
    $filename=time(). '.'.$image_ext;

    $conn=new mysqli('localhost', 'root', '','bltech');
if($conn-> connect_error){
    die('connection failed :' .$conn-> connect_error);
}else{
    $stmt=$conn->prepare("insert into blapk(name, apk, image)
    values(?,?,?)");
    $stmt->bind_param("sss", $name, $apk, $image);
    $stmt-> execute();
    header("location: adminindex.php");
    move_uploaded_file($_FILES['image']['tmp_name'], $path. '/'.$image);
    move_uploaded_file($_FILES['apk']['tmp_name'], $path. '/'.$apk);
    $stmt ->close();
    $conn->close();

}
}

?>

<?php
require("connection.php");
if(isset($_POST['user_delete'])){
    $product_id=$_POST['user_delete'];

    $query="DELETE FROM `blapk` WHERE `blapk`.`id` = $id";
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