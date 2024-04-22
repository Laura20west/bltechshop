<?php
    require_once 'connection.php';

    $sqr="SELECT * FROM blservices";
    $all_services=$conn->query($sqr);

?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>BLshop services</title>
  <link href="serveimg/BLtechlogo.jpg" rel="icon">


  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/sstyle.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
<header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
        <img src="serveimg/BLtechlogo.jpg" alt="BLtech"height="50" width="50" /><span>
              
            </span>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="services.php"> Services </a>
                </li>
                
              </ul>
              
            </div>
           
          </div>
        </nav>
      </div>
    </header>

  <!-- service section -->

  

  <!-- end service section -->

  <!-- fruits section -->

  <section class="fruit_section">
    <div class="container">
      <h2 class="custom_heading">Our Extra Services</h2>
      <?php
        while($row=mysqli_fetch_assoc($all_services)){
        ?>
      <div class="row layout_padding2">
        <div class="col-md-8">
          <div class="fruit_detail-box">
            <h3 class="custom_heading2">
            <?php echo $row["service_name"];?>
            </h3>
            <p class="mt-4 mb-5">
            <?php echo $row["description"];?>
            </p>
            <p class="mt-4 mb-5">
            <?php echo $row["price"];?>
            </p>
            <p class="mt-4 mb-5">
            <?php echo $row["phone_no"];?>
            </p>
            <div>
              <a href="mailto:<?php echo $row["email"];?>" class="custom_dark-btn">
                Contact now
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
          <div class="fruit_img-box d-flex justify-content-center align-items-center">
            <img src="<?php echo $row["image"];?>" alt="" class="" width="250px" />
          </div>
        </div>
      </div>
      <?php
       }
        ?>
    </div>
  </section>

  <!-- end fruits section -->

  <!-- tasty section -->
  

  <!-- end tasty section -->

  <!-- client section -->

  

  <!-- end client section -->

  <!-- contact section -->

  <!-- end contact section -->


  <!-- map section -->




  <!-- footer section -->

    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
          &copy; <a class="border-bottom text-primary" href="mailto:BLtechnologies102@gmail.com">BLtechnologies</a>, All Right Reserved.
       </div>
  </section-->
  <!-- footer section -->


  <!-- end google map js -->
</body>

</html>