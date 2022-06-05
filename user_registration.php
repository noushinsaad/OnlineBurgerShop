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
      $adrs=$_POST['adrs'];
      $ps=$_POST['password'];

      $s="SELECT userid FROM user WHERE userid='$i'";
      $r=mysqli_query($conn,$s);


      $sql="INSERT INTO user values('$n','$p','$m','$i','$adrs','$ps')";
      $result=mysqli_query($conn,$sql);


      if(mysqli_affected_rows($conn)){

        if(mysqli_num_rows($r)!=0){
          echo"User ID already Exist";
        }
        else{
          echo"Registration sucessful!";
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
  <title> Online Burger </title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="style1.css">
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
          <h1>Create an account</h1>
          <form class="form" action="user_registration.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="alert alert-error"></div>
            <input type="text" placeholder="Name" name="name" required />
            <input type="email" name="email" placeholder="Email" pattern="[a-zA-Z0-9.!#$%’*+/=?^_`{|}~-]+@[a-zA-Z0-9-.]+(?:\.[a-zA-Z0-9-]+)" required><br/>
            <input type="text" placeholder="User ID" name="uid" required />
            <input type="text" placeholder="Phone No" name="pno" required />
            <input type="text" placeholder="Adress" name="adrs" required />
            <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
            <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
            <input type="submit" value="Register" class="btn btn-block btn-primary" />
            <input type="submit" value="Log In" class="btn btn-block btn-primary" onclick="location='index.php'">
          </form>
        </div>
      </div>
    </section>


  </body>
</html>
