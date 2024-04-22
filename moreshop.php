<?php
    require_once 'connection.php';

    $sql="SELECT * FROM blshop";
    $all_product=$conn->query($sql);

?>
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
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="https://web.facebook.com/profile.php?id=100095470425028">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    
                    <a class="text-dark px-2" href="https://www.instagram.com/bltechnologies_102/">
                        <i class="fab fa-instagram"></i>
                    </a>
                    
                </div>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">BL</span>Shop</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="shop.php" class="nav-item nav-link active">Previous page</a>
                                                      
                            

                        </div>

                    </div>
                </nav>

            </div>

        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">BL<span class="text-primary font-weight-bold border px-3 mr-1">Shop</span></h1>
                </a>
            </div>
    <div class="col-lg-9 col-md-12">
        <div class="row pb-3">
            <div class="col-12 pb-1">
                <div class="mb-4">
                    <form action="search.php" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" value="<?php if(isset($GET['search'])){echo $_GET['']; }?>" placeholder="Search by name">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </span>
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
    
                    <div class="container-fluid pt-5">
                        <div class="row px-xl-5">
                    
                    <?php   
                while($row=mysqli_fetch_assoc($all_product)){
                    ?>
                    
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">

                        <div class="card product-item border-0 mb-4">
                        <h6 class="text-truncate mb-3"><?php echo $row["name"];?></h6>
                                <div class="d-flex justify-content-center">
                                    <h6><?php echo $row["price"];?></h6>
                                </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <h6>><?php echo $row["description"];?></h6>
                            </div>
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="<?php echo $row["image"];?>" alt="">
                            </div>
                            
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3" id="order">
                                
                                <form method="POST" action="altshop.php" id="orderform">
                                    
                                    
                                    <button class="btn btn-primary" type="submit" name="submit"> ADD TO CART</button>
                                    
                                    
                                </form>
                            </div>
  
                        </div>


                    </div>

                    <?php
                            }
                            ?>

            <!-- Shop Product End -->
        </div>
    </div>

                </div>
        </div>
    </div>
    <!-- Topbar End -->

    

    <!-- Navbar Start -->

    <!-- Navbar End -->


    <!-- Page Header Start -->
    
    <!-- Page Header End -->


    <!-- Shop Start -->
    
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

<body >



    
    <script src="js/main.js"></script>




<div id="categories" class="tabcontent">

</div>

<div id="secondcate" class="tabcontent">

</div>

<div id="order" class="tabcontent">

</div>

<div id="custom" class="tabcontent">

</div>
<div id="news" class="tabcontent">

</div>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
</body>
</html>