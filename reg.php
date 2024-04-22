

<?php


if(isset($_POST['user_category_btn'])){
    $username=$_POST['username'];
   
    $password=$_POST['password'];
    $phonenumber=$_POST['phonenumber'];


    $conn=new mysqli('localhost', 'root', '','bltech');
if($conn-> connect_error){
    die('connection failed :' .$conn-> connect_error);
}else{
    $stmt=$conn->prepare("insert into users(username,password, phonenumber)
    values(?,?,?)");
    $stmt->bind_param("sss", $username, $password, $phonenumber);
    $stmt-> execute();
    header("location: userlogin.php");
    
    $stmt ->close();
    $conn->close();

}
}

?>


