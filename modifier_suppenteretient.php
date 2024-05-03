<?php
$serv = '127.0.0.1';
$username = 'root';
$password = "";
$dbname = "stage";

$conn = new mysqli($serv, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['btmodif'])) {

    $service_ent = $_POST['service_ent'];
    $atelier = $_POST['atelier'];
    $dat_service = $_POST['dat_service'];

    $stmt = $conn->prepare("UPDATE entretient  SET atelier = ?, dat_service = ? WHERE service_ent = ?");


    $stmt->bind_param("sss", $atelier, $dat_service, $service_ent);

    if ($stmt->execute()) {
        echo "Data updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
}


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <script src="js/jquery.slim.js"></script>
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
      <h2 class="m-0 text-primary"><i class="fa fa-car me-3"></i>CarServ</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="homeadm.php" class="nav-item nav-link">Home</a>
        
       
        <a href="loginadmin.php" class="nav-item nav-link">log out</a>


  </nav>

    <form action="" method="POST">
        <h1>modifier</h1>
        <label for="service_ent">Service</label>
        <input type="text" name="service_ent" required>
        <label for="atelier">Atelier</label>
        <input type="text" name="atelier" required>
        <label for="dat_service">Date du service</label>
        <input type="date" name="dat_service" required>
        <input type="submit" name="btmodif" value="modifier">

    </form>
    <?php


if (isset($_POST['btsupp'])) {
    $service_ent = $_POST['service_ent'];
  
    $stmt = $conn->prepare("   DELETE FROM   entretient where service_ent =? ");
    $stmt->bind_param("s", $service_ent);

    if ($stmt->execute()) {
        echo "Delete successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    
}

    ?>



    
    <form action="" method="POST">
        <h1>supprimer </h1>
        <label for="service_ent">Service</label>
        <input type="text" name="service_ent" required>
        
        <input type="submit" name="btsupp" value="supprimer">

    </form>


    
    
</body>

</html>