<?php
//first of all, we need to connect to the database
session_start();
$_SESSION['msg']='';
$_SESSION['name']='';
require_once('DBConnect.php');


//we need to check if the input in form textfields are not empty
if(isset($_POST['uid']) && isset($_POST['pass'])){
  //write the query to check if this username and password exist in the database

  $u=$_POST['uid'];
  $p=$_POST['pass'];

  $sql="SELECT user_id, password FROM admin WHERE user_id='$u' AND password='$p'";

  //Execute the query
  $result=mysqli_query($conn,$sql);

  //check if it return an empty set
  if(mysqli_num_rows($result)!=0){
    //echo"Let him in";
    $_SESSION['msg']="Log in Successful!";
    $_SESSION['name']="Welcome $u";
    header("location: adminPage.php");
  }
   else{
    echo"Username or Password is Wrong";
    //header("location: index.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8"/>
    <title> Online Burger Shop</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>

    <section id="header">
      <div class="row">
        <div class="col-md-2" style="font-size: 50px;color:#F2674A;"> fOOd cORneR </div>
        <!--<div class="col-md-10" style="text-allign: right">
          <a href="#" style="font-size:30px;"> Home </a>
          <a href="#" style="margin-left: 20px; font-size:30px;"> Users </a>
          <a href="#" style="margin-left: 20px; font-size:30px;"> Food Items </a>
          <a href="#" style="margin-left: 20px; font-size:30px;"> User Registration </a>
        </div>
        <div class="col-md-8" style="text-allign: right">
        <a href="user_registration.php" style="margin-right: 20px; font-size:30px;"> Sign Up </a>>
        <input type="button" value="Sign Up" onclick="location='user_registration.php'" />
        </div>-->
      </div>
    </section>

    <section id="section1">
      <div class="body-content">
        <div class="module">
          <h1>Admin Panel Login</h1><br>
          <form class="form" action="admin_index.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <input type="text" name="uid" placeholder="User ID" required><br/>
            <input type="password" name="pass" placeholder="Password" required><br/>
            <input type="submit" class="btn btn-block btn-primary" value="Log In">
          </form>
        </div>
      </div>
    </section>



  </body>
</html>
