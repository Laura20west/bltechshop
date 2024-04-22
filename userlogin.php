<?php
    require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BLshop Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/BLtech-icon.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/my.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-2">
            <h3 class="mb-4">Login</h3>
            <form  method="POST"  enctype="multipart/form-data">
             <div >
                <label for="" class="form-label">Name</label>
                <input type="text" name="username"  placeholder="Enter name" class="form-control">
                            
            </div>
                        
            
            <div >
                <label for="" class="form-label">Password</label>
                <input type="text" name="password"  placeholder="Enter password" class="form-control">
                            
            </div>

 
            <button type="submit"  name="user_category_btn" class="btn btn-primary">Submit</button>
            </form>
            <h5>Don't have an account?</h5>
            <a href="signup.php">Sign up</a>
            
                    
                   
        </div>
    </div>

<?php

session_start();
    
?>
<?php
if(isset($_POST['user_category_btn'])){
    $query="SELECT * FROM `users` WHERE `username`='$_POST[username]' AND `password`='$_POST[password]' ";
    $result=mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==1){
        session_start();
        $_SESSION['UserLogin']=$_POST['username'];
        header("location: shop.php");
    }
    else{
        echo "<script>alert('Incorrect Info');</script>";
    }
}
?>
    <!-- JavaScript Libraries -->

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>