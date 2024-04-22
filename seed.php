<?php


if(isset($_POST['add_category_btn'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $state=$_POST['state'];
    $phone=$_POST['phone'];
    $image=$_FILES['image']['name'];
    
    $path="../img";
    $image_ext=pathinfo($image, PATHINFO_EXTENSION);
    $filename=time(). '.'.$image_ext;

    $conn=new mysqli('localhost', 'root', '','bltech');
if($conn-> connect_error){
    die('connection failed :' .$conn-> connect_error);
}else{
    $stmt=$conn->prepare("insert into bladmins(name, price, description, state, phone, image)
    values(?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $name, $price, $description, $state, $phone, $image);
    $stmt-> execute();
    header("location: adminsecond.php");
    move_uploaded_file($_FILES['image']['tmp_name'], $path. '/'.$image);
    $stmt ->close();
    $conn->close();

}
}

?>

<?php
require("connection.php");
if(isset($_POST['user_delete'])){
    $product_id=$_POST['user_delete'];

    $query="DELETE FROM `blshop` WHERE `blshop`.`product_id` = $product_id";
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