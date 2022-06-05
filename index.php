<?php

session_start();
$_SESSION['msg']='';
$_SESSION['name']='';
require_once('DBConnect.php');



if(isset($_POST['uid']) && isset($_POST['pass'])){


  $u=$_POST['uid'];
  $p=$_POST['pass'];

  $sql="SELECT userid, password FROM user WHERE userid='$u' AND password='$p'";


  $result=mysqli_query($conn,$sql);


  if(mysqli_num_rows($result)!=0){
    $_SESSION['msg']="Log in Successful!";
    $_SESSION['name']="Welcome $u";
    header("location: home.php");
  }
   else{
    echo"Username or Password is Wrong";

  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title> Online Burger </title>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

  <body>

    <section id="header">
      <div class="row">
        <div class="col-md-2" style="font-size: 50px;color:#F2674A;"> fOOd cORneR </div>
      </div>
    </section>

    <section id="section1">
      <div class="body-content">
        <div class="module">
          <h1>User Login</h1><br>
          <form class="form" action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <input type="text" name="uid" placeholder="User ID" required><br/>
            <input type="password" name="pass" placeholder="Password" required><br/>
            <input type="submit" class="btn btn-block btn-primary" value="Log In">
            <input type="submit" value="Create An Account" class="btn btn-block btn-primary" onclick="location='user_registration.php'">
          </form>
        </div>
      </div>
    </section>



  </body>
</html>
