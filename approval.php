<?php
    require("connection.php");
    session_start();
    

    $sqd="SELECT * FROM bladmins";
    
    $all_secad=$conn->query($sqd);

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
        
        <h3 style="font-size:50px; color:white;" >Product Approval page</h3>
        <form  method="POST" enctype="multipart/form-data">
        <button type="submit"  name="log_out" class="spbutton">Logout</button>
            
        </form>
    
    </div>

<?php
if(isset($_POST['log_out'])){
    
        session_destroy();
       
        header("location: login.php");
    }

    
?>
    <!-- JavaScript Libraries -->

    <!-- Template Javascript -->

    
    <script src="js/main.js"></script>




<div id="categories" class="tabcontent">
<div class="container-fluid pt-4 px-4">
<?php
    while($row=mysqli_fetch_assoc($all_secad)){
    ?>
        <div class="row g-4">
        <h3 class="mb-4">Products</h3>
        <form action="seed.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                 <input type="text" name="name"  placeholder="Enter product name" value="<?php echo $row["name"];?>" class="form-control">
                            
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="text" name="price" placeholder="Enter Price" value="<?php echo $row["price"];?>" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <input type="text" name="description" placeholder="Enter short description of product"  value="<?php echo $row["description"];?>" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">State Located</label>
                <input type="text" name="state" placeholder="Enter state located"  value="<?php echo $row["state"];?>" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone</label>
                <input type="text"  name="phone" placeholder="Enter your phone number"  value="<?php echo $row["phone"];?>" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Upload Image</label>
                <input type="file" name="image" class="form-control" value="img/<?php echo $row["image"];?>" id="">
            </div>
                        
                        
 
            <button type="submit"  name="add_category_btn" class="btn btn-primary">Submit</button>
        </form>
                    
                   
        </div>
        <?php
    }
         ?>
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