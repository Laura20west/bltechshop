<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BLShop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/BLtechlogo.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/pstyle.css" rel="stylesheet">
</head>
<body>
<div class="col-12 pb-1">
                <div class="mb-4">
                    <form action="reg.php" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" value="<?php if(isset($GET['search'])){echo $_GET['']; }?>" placeholder="Enter name">
                            <input type="text" class="form-control" name="search" value="<?php if(isset($GET['search'])){echo $_GET['']; }?>" placeholder="Enter password">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </span>
                            </div>
                        </div>
                    </form>
                        </div>
                    
<?php

session_start();


        
    
?>       
</div>
</body>
