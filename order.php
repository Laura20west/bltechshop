
<?php

$order=$_POST['order'];
$loc=file_get_contents("http://ip-api.com/json");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require'PHPMailer/src/Exception.php';
require'PHPMailer/src/PHPMailer.php';
require'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug;                      //Enable verbose debug output
    $mail->isSMTP();                                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'BLtechnologies102@gmail.com';                     //SMTP username
    $mail->Password   = 'ojsywpfviabxdwkv';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    
    $mail->addAddress('BLtechnologies102@gmail.com');     //Add a recipient
      
    

    $content=$order;

    $loc_o=JSON_decode($loc);
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Order received";
    $mail->Body    = $content." ". $order." ".$loc_o->city;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message sent sucessfully';
    



} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    
?>

<?php


if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $productid=$_POST['productid'];

    

    $conn=new mysqli('localhost', 'root', '','bltech');
if($conn-> connect_error){
    die('connection failed :' .$conn-> connect_error);
}else{
    $stmt=$conn->prepare("insert into bladorders(name,price,quantity,productid)
    values(?,?,?,?)");
    $stmt->bind_param("ssii", $name,$price, $quantity, $productid);
    $stmt-> execute();
    header("location: payment.php");
    $stmt ->close();
    $conn->close();

}
}
?>
<?php


if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $price=$_POST['price'];


    

    $conn=new mysqli('localhost', 'root', '','bltech');
if($conn-> connect_error){
    die('connection failed :' .$conn-> connect_error);
}else{
    $stmt=$conn->prepare("insert into blorders(name,price)
    values(?,?)");
    $stmt->bind_param("ssii", $name,$price);
    $stmt-> execute();
    header("location: payment.php");
    $stmt ->close();
    $conn->close();

}
}
?>




