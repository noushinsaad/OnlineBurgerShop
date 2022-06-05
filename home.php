<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

  <head>
    <meta charset="utf-8"/>
    <title> Online Burger Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="fontawesome-free-5.14.0-web/css/all.css" type="text/css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style1.css">
  </head>

  <body>

    <section id="header">
      <div class="row">
        <div class="col-md-2" style="font-size: 50px;color:#F2674A;"> fOOd cORneR </div>
        <div class="col-md-8" style="text-allign: right">
          <a href="home.php" style="font-size:30px;"> Home </a>
          <a href="#" style="margin-left: 20px; font-size:30px;"> Catalogue </a>
          <a href="#" style="margin-left: 20px; font-size:30px;"> Food Items </a>
          <a href="#" style="margin-left: 20px; font-size:30px;"> Order Status </a>
        </div>
      </div>
    </section>

    <section id="section1">
      <div class="Title" style="font-size: 50px;color:#F2674A;"> HomePage </div>
      <div class="body content">
        <div class="welcome">
          <div class="alert alert-success"><?= $_SESSION['msg'] ?></div><br>
          <span class="user"><?= $_SESSION['name'] ?></span>
          <h1>Welcome to our page</h1>
          <h2>We are always ready to serve you</h2><br>
          <input type="submit" value="Log Out"  class="btn btn-block btn-primary" onclick="location='index.php'"/>
        </div>
      </div>
    </section>


  </body>

</html>
