<?php


if(isset($_POST['add_category_btn'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $stateprice=$_POST['stateprice'];
    $formerprice=$_POST['formerprice'];
    $description=$_POST['description'];

    

    
    $image=$_FILES['image']['name'];
    
    $path="../shop";
    $image_ext=pathinfo($image, PATHINFO_EXTENSION);
    $filename=time(). '.'.$image_ext;

    $conn=new mysqli('localhost', 'root', '','bltech');
if($conn-> connect_error){
    die('connection failed :' .$conn-> connect_error);
}else{
    $stmt=$conn->prepare("insert into blshop(name, price, state, stateprice, description, image)
    values(?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $name, $price, $description, $image);
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