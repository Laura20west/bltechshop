<?php
    require("connection.php");
    session_start();
    if(!isset($_SESSION['SecondLogin'])){
        header("location: secondlogin.php");
    }
    $sql="SELECT * FROM blshop";
    $sqr="SELECT * FROM blservices";
    $sqs="SELECT * FROM blorders";
    $sqp="SELECT * FROM blpay";
    $sqn="SELECT * FROM blnews";
    $squ="SELECT * FROM users";
    $all_product=$conn->query($sql);
    $all_services=$conn->query($sqr);
    $all_orders=$conn->query($sqs);
    $all_pays=$conn->query($sqp);
    $all_news=$conn->query($sqn);
    $all_users=$conn->query($squ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BLshop</title>
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
    <link href="css/mystyle.css" rel="stylesheet">
</head>

<body style="background-color:cornflowerblue;">
    <div class="header" style="background-color:cadetblue; ">
        
        <h3 style="font-size:50px; color:white;" >Welcome to BLShop UserAdmin page</h3>
        <form  method="POST" enctype="multipart/form-data">
        <button type="submit"  name="log_out" class="spbutton">Logout</button>
            
        </form>
    
    </div>

<?php
if(isset($_POST['log_out'])){
    
        session_destroy();
       
        header("location: secondlogin.php");
    }

    
?>
    <!-- JavaScript Libraries -->

    <!-- Template Javascript -->

    
    <script src="js/main.js"></script>
<p style="color:bisque; font-size: 15px; position:relative;" >Input your products and wait for product validation, until then your products will be displayed on 'other' page</p>


<div id="categories" class="tabcontent">
<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
        <h3 class="mb-4">Shop</h3>
        <form action="seed.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                 <input type="text" name="name"  placeholder="Enter product name" class="form-control">
                            
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="text" name="price" placeholder="Enter Price" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <input type="text" name="description" placeholder="Enter short description of product" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">State Located</label>
                <input type="text" name="state" placeholder="Enter state located" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone</label>
                <input type="text"  name="phone" placeholder="Enter your phone number" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Upload Image</label>
                <input type="file" name="image" class="form-control" id="">
            </div>
                        
                        
 
            <button type="submit"  name="add_category_btn" class="btn btn-primary">Submit</button>
        </form>
                    
                   
        </div>
     </div>
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