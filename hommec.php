<?php
$serv = '127.0.0.1';
$username1 = 'root';
$password = "";
$dbname = "stage";

$conn = new mysqli($serv, $username1, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}






?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="/css//style.css">
  <style>
  
  </style>

</head>

<body>
    

  <script src="js/bootstrap.min.js"></script>
  <script src="/package//dist//jquery.slim.js"></script>
  <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
      <h2 class="m-0 text-primary"><i class="fa fa-car me-3"></i>CarServ</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="hommec.php" class="nav-item nav-link">Home</a>
        <a href="aboutc.php" class="nav-item nav-link">About</a>
       
        <a href="index.php" class="nav-item nav-link">log out</a>
        
        <!--profil  modifier email et modifier password and supprition reservation-->
 


  </nav>
  <!---------------------->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image//carousel-bg-1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text_c">
        <h5 style="color: #070707;">entretient</h5>
        <div class="text-c">
        <p class="fa fa-check text-success me-3">service entretient </p>
        <a href="reserventretient.php"class="btn btn-primary py-3 px-5 mt-3">reserver<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
       
       
      </div>
    </div>
    <div class="carousel-item">
      <img src="image//carousel-bg-2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-c">
        
      <p lass="fa fa-check text-success me-3">service diagnostique</p>
        <a href="reservdiagnostique.php"class="btn btn-primary py-3 px-5 mt-3">reserver<i class="fa fa-arrow-right ms-3"></i></a>
      </div>
    </div>
  
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</body>

</html>