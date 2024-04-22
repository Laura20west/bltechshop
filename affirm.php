<?php
    require("connection.php");
    
    $sqs="SELECT * FROM blorders";
    $all_orders=$conn->query($sqs);
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


    <!-- Template Stylesheet -->
    <link href="css/cat.css" rel="stylesheet">
</head>

<body >
    
    <div class="cat">
        
        <h2>Welcome to <br>BLShop</h2>
        <h3>Experience a glimpse of BLTECHNLOGIES</h3>
        <img src="Coolcat.jpg" height="50" width="50" alt="smile" class="cool" id="item">
        <form action="cancode.php" method="POST" >
        <button type="submit"  name="welcome" class="specbutton">Welcome</button>
        <?php
            while($row=mysqli_fetch_assoc($all_orders)){
        ?>
        <div>
        <form action="shop.php" method="POST" >
        <button type="submit"  name="log_in" value="<?php echo $row["id"];?>" class="specbutton">Login</button>
        
        </form>
        </div>
        <?php
          }
     ?>
        

    </div>
    


    
    <script src="js/main.js"></script>


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