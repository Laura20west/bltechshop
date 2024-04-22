<?php
session_start();
include 'connection.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      Testrun
    </title>
  </head>
  <body>
    <form class="form" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST" >
    <input type="text" name="username" autocomplete="off" >
    <input type="password" name="password" autocomplete="new-password" >
    <input type="submit"  value="login">

    </form>
  </body>
</html>
<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){

    $username =$_POST['username'];
    $password = sha1($_POST['password']);

    $stmt =$conn->prepare("SELECT * FROM userstwo =? AND password =? LIMIT 1");
    $stmt-> execute(array($username, $password));
    $checkuser = $stmt-> num_rows();
    $user =$stmt->fetch();

    if ($checkuser > 0){

      $_SESSION['user'] =$user['username'];
      $_SESSION['type'] = $user['type'];
      header("location: home.php"); 
    }
  }
?>