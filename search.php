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
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
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
                            
                            <a href="altshop.php" class="nav-item nav-link active">Previous</a>
                                                      
                            <div class="especial">
                                <form action="redirect.php" method="POST" >
                                    <button type="submit" class="specbutton" name="home">Home</button>
                                </form>
                            </div>
                            <div class="especial">
                                <form action="redirect.php" method="POST" >
                                    <button type="submit" class="specbutton" name="services">Services</button>
                                </form>
                            </div>
                            <div class="especial">
                                <form action="redirect.php" method="POST">
                                    <button type="submit" class="specbutton" name="contact">Contact</button>
                                </form>
                            </div>
                            <style>
                                .especial button{
                                    background-color: #FFF;
                                    padding: 10px 20px;
                                    border: none;
                                    border-radius: 4px;
                                    cursor: pointer;
                                    padding-left: 50px;
                                    padding-right: 50px;
                                    margin: auto;
                                    width: 100%;
  
                                    padding: 20px;
  
                                }
                                .especial .specbutton{
                                    font-size: 15px;
                                    font-style: normal;
}
                            </style>

                        </div>

                    </div>
                </nav>

            </div>


<?php
require_once 'connection.php';


    if(isset($_GET['search'])){
        $filtervalues=$_GET['search'];
        $query ="SELECT * FROM blshop  WHERE CONCAT(name, price, description, image) LIKE '%$filtervalues%' ";
        $query_run= mysqli_query($conn, $query); 


        if(mysqli_num_rows($query_run)>0){
                   
            foreach($query_run as $items){
                ?>
                    <div class="container-fluid pt-5">
                        <div class="row px-xl-5">
                    
                    
                    
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">

                        <div class="card product-item border-0 mb-4">
                        <h6 class="text-truncate mb-3"><?=$items['name'];?></h6>
                                <div class="d-flex justify-content-center">
                                    <h6><?=$items['price'];?></h6>
                                </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <h6>><?=$items['description'];?></h6>
                            </div>
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="<?=$items['image'];?>" alt="">
                            </div>
                            
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3" id="order">
                                
                        <form method="POST" action="altshop.php?id=<?=$items['product_id'];?>">
                            <input type="text" name="name" id="name" placeholder="Enter order..." value="<?=$items['name'];?>" readonly>
            
                            <input type="text" name="price" id="price" placeholder="Enter order..." value="<?=$items['price'];?>" readonly>
                            
                            <input type="text" name="quantity" id="quantity" placeholder="Enter order..." value="" >
                            <input type="text" id="productid" name="productid" value=#<?=$items['product_id'];?> readonly>
                        <button class="btn btn-primary" type="submit" name="add_to_cart"> ADD TO CART </button>    
                            </form>  
                            </div>
  
                        </div>



                    </div>
        


            <!-- Shop Product End -->
        </div>
    </div>
                    


                <?php
                    
            }
        }
        }
                ?>

        </div>
    </div>
</body>
</html>