<?php
    require("connection.php");
    session_start();
    
    $sqk="SELECT * FROM blapk";
    $all_apk=$conn->query($sqk);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BLShop:APK Download</title>
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

<body style="background-color:#E0BBE4;">
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    
                    <a class="text-dark px-2" href="https://www.instagram.com/bltechnologies_102/">
                        <i class="fab fa-instagram"></i>
                    </a>

                </div>
            </div>

        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">BL<span class="text-primary font-weight-bold border px-3 mr-1">Shop</span></h1>
                </a>
            </div>

        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            
            <div class="change" style="width:100%;">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">BL</span>Shop</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0" >
                            <a href="shop.php" class="nav-item nav-link active">APKs</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <a href="index.php" class="nav-item nav-link ">Home</a>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                            <a href="services.php" class="nav-item nav-link ">Services</a>
                                                      
                            

                        </div>
                        <form  method="POST" enctype="multipart/form-data">
                            <button type="submit"  name="log_out" class="spbutton" style="border:0px; background-color:red;">Logout</button>
            
                        </form>

                    </div>
                </nav>

            </div>
        </div>
    </div>
    <?php
        if(isset($_POST['log_out'])){
    
        session_destroy();
       
        header("location: userlogin.php");
    }

    
?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    
    <!-- Page Header End -->

    <div class="col-12 pb-1">
        <div class="mb-4" >
            <form action="search.php" method="GET" id="search">
            <div class="input-group">
                            <input type="text" class="form-control" name="search" value="<?php if(isset($GET['search'])){echo $_GET['']; }?>" placeholder="Search by name">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </span>
                            </div>
                        </div>
                    </form>
                        </div>
                        
    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div >
                <div class="pb-3" style="display: flex; flex-wrap: wrap;">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h2 style="color:#E0BBE4;">APK Hub</h2>
                            <a href="moreshop.php" style="color:blue;" class="nav-item nav-link active"><i class="fa fa-shopping-cart"></i></a>
                            
                        </div>
                    </div>
                    <?php
                while($row=mysqli_fetch_assoc($all_apk)){
                    ?>
                    
                    <div class="col-lg-4" style="height: 30%; width: 10%;">

                        <div class="product-item border-0 mb-4">
                        <div class="card-footer d-flex justify-content-between bg-light border">
                        <h5 class="text-truncate mb-3"><b><?php echo $row["name"];?></b></h5>

                        </div>
                        
                            <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="<?php echo $row["apk"];?>" download>
                                <img src="<?php echo $row["image"];?>" alt="W3Schools" width="104" height="142">
                            </a>
                            </div>

                            

                            

                        </div>

                    </div>
                    <?php
                            }
                            ?>


                    
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold">BL<span class="text-primary font-weight-bold border border-white px-3 mr-1">Shop</span></h1>
                </a>
                <p>Choose to shop your lazy order at BLShop</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Calabar municipal</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"><a href="mailto:BLtechnologies102@gmail.com">BLtechnologies102@gmail.com</a></i></p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+2348130630541</p>
            </div>
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom text-primary" href="mailto:BLtechnologies102@gmail.com">BLtechnologies</a>, All Right Reserved.
                    </div>
        </div>
        
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script> 
    <script src="js/payment.js"></script>
</body>

</html>