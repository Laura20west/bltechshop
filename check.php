

<?php

    $conn =mysqli_connect('localhost', 'root', '','bltech');
    if(!$conn){
        echo "not connected to database";
    }

if(isset($_POST['user_category_btn'])){
    $username=$_POST['username'];
   
    $password=$_POST['password'];
    $phonenumber=$_POST['phonenumber'];

    $checkuser="SELECT * from users where username ='$username'";
    $result = mysqli_query($conn, $checkuser);
    $count = mysqli_num_rows($result);

    if($count>0){
        echo "user already exist";
    }
    else{
        $sql = "INSERT into users(username, password, phonenumber) values ('$username', '$password', '$phonenumber')";
        if($conn-> query($sql)){
            echo "user added";
        }
        else{
            echo  "user not added";
        }
    }


}

?>


