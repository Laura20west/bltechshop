<?php
    require_once 'connection.php';
    $sqs="SELECT * FROM blorders";
    $all_orders=$conn->query($sqs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/mine.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <div class="heading">
    <h3>BLTECHNOLOGIES</h3>
  </div>
<?php
  
  ?>
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
      <form action="cancode.php" method="POST" id="cartForm">
      <div class="form-group">
          <label for="email">Phone number</label>
          <input type="text" name="emailname" id="email-address" required />
        </div>
            <button type="submit" name="user_delete" value="<?php echo $row["id"];?>">Clear cart</button>
        </form>
    <h2>Please clear cart after order to enable us receive your order</h2>
  <script>
        const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_live_0f5499ac0517d845a9ecece1ec5542bbe3ab41c6', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: $total* 100,
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

      

      
</body>
</html>