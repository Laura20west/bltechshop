<?php
    require_once 'connection.php';

    $sql="SELECT * FROM blshop";
    $all_product=$conn->query($sql);
    $sqs="SELECT * FROM blstate";
    $all_state=$conn->query($sqs);
    session_start();

    if(isset($_POST['add_to_cart'])){
        if(isset($_SESSION['cart'])){
            $session_array_id =array_column($_SESSION['cart'], "product_id");

            if(!in_array($_POST["productid"], $session_array_id)){
                $session_array =array(
                    "productid"=>$_POST['productid'],
                    "quantity"=>$_POST['quantity'],
                    "price"=> $_POST['price'],
                    "name"=>$_POST['name'],
                    
                );
                $_SESSION['cart'][]=$session_array;
            }
        }
        else{
            $session_array =array(
                "productid"=>$_POST['productid'],
                "quantity"=>$_POST['quantity'],
                "price"=> $_POST['price'],
                "name"=>$_POST['name'],
                
            );
            $_SESSION['cart'][]=$session_array;
        }
    }
    

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
    <link href="css/shopstyle.css" rel="stylesheet">
</head>

<body>
<div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h3 class="m-0 display-5 font-weight-semi-bold">Products can only be delivered within UNICAL</h3>
                </a>
            </div>

        </div>
<div class="col-12 pb-1">
                <div class="mb-4">
                    <form action="search.php" method="GET" id="search">
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
                        <a href="shop.php" class="nav-item" style="background-color:powderblue; padding:12px; border: 1px solid #ccc; border-radius: 4px;">Previous</a>
                    </div>
    <!-- Topbar Start -->
    
    <div class="container-fluid pt-4 px-4">
    
        <div class="row g-4">
            <div class="row g-5">
                <h2>Items</h2>
            </div>
            <?php
            $total =0;
            $output="";

            $output.="
            <table style='width:100%'>
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Item quantity</th>
                    <th>Item Price</th>
                    <th>Item Total</th>
                </tr>
            
            ";

            if(!empty($_SESSION['cart'])){
                foreach ($_SESSION['cart'] as $key => $value){

                    $output.= "
                        <tr>
                            <td>".$value['productid']."</td>
                            <td>".$value['name']."</td>
                            <td>".$value['quantity']."</td>
                            <td>".$value['price']."</td>
                            <td>".number_format($value['price']* $value['quantity'],2)."</td>
                            <td>
                                <a href='altshop.php?action=remove&productid=".$value['productid']."'>
                                <button>Remove</button>
                                </a>
                            </td>
                        </tr>
            
                    ";
                    $total =$total + $value['quantity'] * $value['price'];
                }
                $output .="
                    <tr>
                    <td colspan='3'></td>
                    <td></b>Total Price</b></td>
                    <td>".number_format($total, 2)."</td>
                    <td>
                        <a href='altshop.php?action=clearall'>
                        <button>Clear</button>
                        </a>
                    </td>
                    <td>
                    <form method='POST' action='dump.php' >
                    <button type='submit'  name='user_category_btn' class='btn btn-primary'>Submit</button>
                    </form>
                    
                    </td>
                    </tr>
                ";
            }
            
            echo $output;
            echo $total;
            
            
            ?>
        </div>
    </div>
    
<?php
if(isset($_GET['action'])){
    
    if($_GET['action'] == "clearall"){
        
        unset($_SESSION['cart']);
    }

    
}

if(isset($_GET['action'])){
    if($_GET['action'] == "remove"){
        $key==$value['productid'];
            
        unset($_SESSION['cart'][$key]);
            
        }
    }

?>
<form action="dump.php" method="POST" id="pay" >
    <div class="form-group" >
        <label for="last-name">Send your order before paying</label>
        <textarea style="border: 0px solid #FFDFD3; border-radius: 0px; background-color: #FFDFD3; color: #FFDFD3; font-size: 16px; resize: none;" readonly="readonly" class="form-control" rows="6" id="quantities" name= "quantities" placeholder="Message"
         value="<?php echo var_dump($_SESSION['cart'])?>"  ></textarea>

    </div>
    <button type="submit" name="submit" style="background-color:blueviolet; width:100px; height: 100px;"> Send Your Order </button>


</form>

<form id="paymentForm">
      
      <div class="form-group">

      
        <label for="email">Email Address</label>
        <input type="email" name="emailname" id="email-address" required />
      </div>
      
      <div class="form-group">
        <label for="last-name">First Name</label>
        <input type="text" name="lastname" id="last-name" />
      </div>
      <div class="form-group">
        <label for="last-name">Last Name</label>
        <input type="text" name="lastname" id="last-name" />
      </div>
      
      
      <div class="form-submit">
        <button type="submit" name="submit" onclick="payWithPaystack()"> Pay </button>
        
        
      </div>
    </form>
    <script>
        const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_live_0f5499ac0517d845a9ecece1ec5542bbe3ab41c6', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: <?php echo $total ;?>* 100,
    currency:"NGN",
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
    }
  });

  handler.openIframe();
}


      </script>

      <?php

     ?>
      
      <script src="https://js.paystack.co/v1/inline.js"></script> 
   

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