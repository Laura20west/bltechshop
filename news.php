<?php


if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $emailname=$_POST['emailname'];

    $conn=new mysqli('localhost', 'root', '','bltech');
if($conn-> connect_error){
    die('connection failed :' .$conn-> connect_error);
}else{
    $stmt=$conn->prepare("insert into blnews(name, emailname)
    values(?,?)");
    $stmt->bind_param("ss", $name, $emailname);
    $stmt-> execute();
    header("location: index.php");
    
    $stmt ->close();
    $conn->close();

}
}

?>