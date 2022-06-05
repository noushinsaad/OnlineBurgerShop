<?php
  session_start();
  $_SESSION['msg']='';
  require_once('DBConnect.php');

  if($_SERVER['REQUEST_METHOD']=='POST'){

    if($_POST['password']==$_POST['confirmpassword']){
      $n=$_POST['name'];
      $m=$_POST['email'];
      $i=$_POST['uid'];
      $p=$_POST['pno'];
      $ps=$_POST['password'];

      $s="SELECT user_id FROM admin WHERE user_id='$i'";
      $r=mysqli_query($conn,$s);


      $sql="INSERT INTO admin values('$n','$i','$p','$m','$ps')";
      $result=mysqli_query($conn,$sql);


      if(mysqli_affected_rows($conn)){

        if(mysqli_num_rows($r)!=0){
          echo"User ID already Exist";
        }
        else{
          echo"Registration sucessful! Added $n to the database";
        }
      }
      else{
        echo"User could not added to the database!";
      }

    }
    else{
      echo"Two password didn't match";
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <title> Online Burger Shop</title>
  <link href="css/bootstrap.min.css" rel="stylesheet"/>
  <link href="fontawesome-free-5.14.0-web/css/all.css" type="text/css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

  <body>
    <!--following section is used for creating the menubar in the webpage -->
    <section id="header">
      <div class="row">
        <div class="col-md-2" style="font-size: 50px;color:#F2674A;"> fOOd cORneR </div>
        <div class="col-md-8" style="text-allign: left">
          <a href="adminPage.php" style="font-size:30px;"> Home </a>
          <a href="users.php" style="margin-left: 20px; font-size:30px;"> Users </a>
          <a href="#" style="margin-left: 20px; font-size:30px;"> Food Items </a>
          <a href="#" style="margin-left: 20px; font-size:30px;"> Category </a>
          <a href="admin_reg.php" style="margin-left: 20px; font-size:30px;"> Add new Admin </a>
        </div>
      </div>
    </section>

    <section id="section1">
      <div class="body-content">
        <div class="module">
          <h1>Create an account</h1>
          <form class="form" action="admin_reg.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="alert alert-error"></div>
            <input type="text" placeholder="Name" name="name" required />
            <input type="email" name="email" placeholder="Email" pattern="[a-zA-Z0-9.!#$%’*+/=?^_`{|}~-]+@[a-zA-Z0-9-.]+(?:\.[a-zA-Z0-9-]+)" required><br/>
            <input type="text" placeholder="User ID" name="uid" required />
            <input type="text" placeholder="Phone No" name="pno" required />
            <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
            <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
            <input type="submit" value="Add to the admin database"  class="btn btn-block btn-primary" />
          </form>
          <input type="submit" value="Log Out"  class="btn btn-block btn-primary" onclick="location='admin_index.php'"/>
        </div>
      </div>
    </section>


    </body>
</html>
