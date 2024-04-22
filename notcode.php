<?php


if(isset($_POST['plus_category_btn'])){
    $name=$_POST['name'];
    $service_name=$_POST['service_name'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $phone_no=$_POST['phone_no'];
    $email=$_POST['email'];
    $image=$_FILES['image']['name'];
    
    $path="../services";
    $image_ext=pathinfo($image, PATHINFO_EXTENSION);    
    $filename=time(). '.'.$image_ext;

    $conn=new mysqli('localhost', 'root', '','bltech');
if($conn-> connect_error){
    die('connection failed :' .$conn-> connect_error);
}else{
    $stmt=$conn->prepare("insert into blservices(name, service_name, description, price, phone_no,email, image)
    values(?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssiss", $name, $service_name, $description, $price,$phone_no, $email, $image);
    $stmt-> execute();
    header("location: adminindex.php");
    move_uploaded_file($_FILES['image']['tmp_name'], $path. '/'.$image);
    $stmt ->close();
    $conn->close();

}
}
?>

<?php
require("connection.php");
if(isset($_POST['user_delete'])){
    $service_id=$_POST['user_delete'];

    $query="DELETE FROM `blservices` WHERE `blservices`.`service_id` = $service_id";
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