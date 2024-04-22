<?php
    require("connection.php");
    session_start();
    if(!isset($_SESSION['LoginId'])){
        header("location: login.php");
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

<body >
    <div class="header">
        
        <h3 >Welcome to <br>BLtechnologies</h3>
        <form  method="POST" enctype="multipart/form-data">
        <button type="submit"  name="log_out" class="spbutton">Logout</button>
            
        </form>
        <div class="tab">
  <button class="btn btn-primary" onclick="openCity(event, 'index')">Admin Dashboard</button>

  <button class="btn btn-primary" onclick="openCity(event, 'categories')">Shop</button>
  <button class="btn btn-primary" onclick="openCity(event, 'acp')">Apk</button>
  <button class="btn btn-primary" onclick="openCity(event, 'secondcate')">Services</button>
  <button class="btn btn-primary" onclick="openCity(event, 'order')">Order</button>
  <button class="btn btn-primary" onclick="openCity(event, 'custom')">Customers</button>
  <button class="btn btn-primary" onclick="openCity(event, 'news')">Newsletters</button>
  <button class="btn btn-primary" onclick="openCity(event, 'users')">Users</button>
  
</div>
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

<div id="index" class="tabcontent">
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="row g-5">
            <h2>Sales</h2>
        </div>
        <div class="mb-3">
        <table style="width:100%">
            <tr>
                <td>Product Id</td>
                <td>Product Name</td>
                <td>Product Price</td>
                <td>Image</td>
                <td>Time Ordered</td>
                </tr>
                <?php
                    while($row=mysqli_fetch_assoc($all_product)){
                ?>
            <tr>
                <td><?php echo $row["product_id"];?></td>
                <td><?php echo $row["name"];?></td>
                <td><?php echo $row["price"];?></td>
                <td>
                    <img src="../shop/<?php echo $row["image"];?>" alt="Image" width=50 height=50></td>
                    <td><?php echo $row["created_at"];?></td>
                    <td>
                        <form action="code.php" method="POST">
                        <button type="submit" name="user_delete" value="<?php echo $row["product_id"];?>">Delete</button>
                        </form>
                    </td>
                    
            </tr>
                
                <?php
                    }
                ?>
        </table>

                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="row g-5">
                        <h2>Sales</h2>
                    </div>
                    <div class="mb-3">
                        <table style="width:100%">
                            <tr>
                              <td>Service Id</td>
                              <td>Name</td>
                              <td>Service Name</td>
                              
                              <td>Phone number</td>
                              <td>Email</td>
                              <td>Time Ordered</td>
                            </tr>
                            <?php
                         while($row=mysqli_fetch_assoc($all_services)){
                            ?>
                            <tr>
                              <td><?php echo $row["service_id"];?></td>
                              <td><?php echo $row["name"];?></td>
                              <td><?php echo $row["service_name"];?></td>

                              <td><?php echo $row["phone_no"];?></td>
                              <td><?php echo $row["email"];?></td>
                              <td><?php echo $row["created_at"];?></td>
                              <td>
                                <form action="notcode.php" method="POST">
                                    <button type="submit" name="user_delete" value="<?php echo $row["service_id"];?>">Delete</button>
                                </form>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                          </table>

                    </div>
                </div>
            </div>
</div>


<div id="categories" class="tabcontent">
<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
        <h3 class="mb-4">Shop</h3>
        <form action="code.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                 <input type="text" name="name"  placeholder="Enter product name" class="form-control">
                            
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="text" name="price" placeholder="Enter Price" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">State Price</label>
                <input type="text" name="stateprice" placeholder="Enter State Price" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Former price</label>
                <input type="text" name="formerprice" placeholder="Enter former Price" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <input type="text"  name="description" placeholder="Enter description" class="form-control" id="">
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


<div id="acp" class="tabcontent">
<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
        <h3 class="mb-4">Shop</h3>
        <form action="acp.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                 <input type="text" name="name"  placeholder="Enter product name" class="form-control">
                            
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Upload Apk</label>
                <input type="file" name="apk" class="form-control" id="">
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

<div id="secondcate" class="tabcontent">
<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
        <h3 class="mb-4">Add Services</h3>
        <form action="notcode.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name"  placeholder="Enter product name" class="form-control">
                            
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Name of Service</label>
            <input type="text" name="service_name"  placeholder="Enter service name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" name="email"  placeholder="Enter email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Phone Number</label>
            <input type="text" name="phone_no"  placeholder="Enter phone number" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input type="text" name="price" placeholder="Enter Price" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <input type="text"  name="description" placeholder="Enter description" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Upload Image</label>
             <input type="file" name="image" class="form-control" id="">
        </div>
        <button type="submit"  name="plus_category_btn" class="btn btn-primary">Submit</button>
        </form>
                    
                   
    </div>
        </div>
</div>

<div id="order" class="tabcontent">
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="row g-5">
            <h2>Order</h2>
        </div>
        
        <div class="mb-3">
        <table style="width:100%">
            <tr>
                <td>Product name</td>
                
                </tr>
                <?php
                    while($row=mysqli_fetch_assoc($all_orders)){
                ?>
            <tr>
                <td><?php echo $row["quantities"];?></td>
                
                <td>
                <form action="willcode.php" method="POST">
            <button type="submit" name="user_delete" value="<?php echo $row["id"];?>">Delete</button>
        </form>
                </td>
                
                </tr>
                <?php
                    }
                ?>
                
        </table>

                    </div>
                </div>
            </div>
</div>

<div id="custom" class="tabcontent">
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="row g-5">
            <h2>Customers Email</h2>
        </div>
        
        <div class="mb-3">
        <table style="width:100%">
            <tr>
                <td>Customers email</td>
                
                <td>Time Ordered</td>
                </tr>
                <?php
                    while($row=mysqli_fetch_assoc($all_pays)){
                ?>
            <tr>
                <td><?php echo $row["emailname"];?></td>
                
                <td><?php echo $row["created_at"];?></td>
                <td>
                <form action="willcode.php" method="POST">
            <button type="submit" name="user_delete" value="<?php echo $row["id"];?>">Delete</button>
        </form>
                </td>
                
                </tr>
                <?php
                    }
                ?>
                
        </table>

                    </div>
                </div>
            </div>
</div>
<div id="news" class="tabcontent">
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="row g-5">
            <h2>Newsletters Emails</h2>
        </div>
        
        <div class="mb-3">
        <table style="width:100%">
            <tr>
                <td>Newsletter email</td>
                <td>Name</td>
                
                <td>Time signed</td>
                </tr>
                <?php
                    while($row=mysqli_fetch_assoc($all_news)){
                ?>
            <tr>
                <td><?php echo $row["emailname"];?></td>
                <td><?php echo $row["name"];?></td>
                
                <td><?php echo $row["signed_at"];?></td>
                <td>
                <form action="willcode.php" method="POST">
            <button type="submit" name="news_delete" value="<?php echo $row["id"];?>">Delete</button>
        </form>
                </td>
                
                </tr>
                <?php
                    }
                ?>
                
        </table>

                    </div>
                </div>
            </div>
</div>
<div id="users" class="tabcontent">
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="row g-5">
            <h2>Users</h2>
        </div>
        
        <div class="mb-3">
        <table style="width:100%">
            <tr>

                <td>Name</td>
                <td>Password</td>
                <td>Phone number</td>
               
                
                
                </tr>
                <?php
                    while($row=mysqli_fetch_assoc($all_users)){
                ?>
            <tr>
                
                <td><?php echo $row["username"];?></td>
                <td><?php echo $row["password"];?></td>
                <td><?php echo $row["phonenumber"];?></td>

                
                
                
                
                </tr>
                <?php
                    }
                ?>
                
        </table>

                    </div>
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