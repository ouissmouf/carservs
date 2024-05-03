<?php
$serv = '127.0.0.1';
$username = 'root';
$password = "";
$dbname = "stage";

$conn = new mysqli($serv, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['btajout'])) {
    $service_diag= $_POST['service_diag'];
    $atelier = $_POST['atelier'];
    $dat_service = $_POST['dat_service'];

    $stmt = $conn->prepare("INSERT INTO diagnostique (service_diag, atelier, dat_service) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $service_diag, $atelier, $dat_service);

    if ($stmt->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
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
        <h1>Ajouter des services</h1>
        <label for="service_diag">Service</label>
        <input type="text" name="service_diag" required>
        <label for="atelier">Atelier</label>
        <input type="text" name="atelier" required>
        <label for="dat_service">Date du service</label>
        <input type="date" name="dat_service" required>
        <input type="submit" name="btajout" value="Ajouter">

    </form>
    <form action="" method="POST">
        <label for="service_diag">Service</label>
        <input type="text" name="service_diag" required>

        <input type="submit" name="btaff" value="Afficher">
    </form>

    <?php
    if (isset($_POST['btaff'])) {
        $service_diag = $_POST['service_diag'];


        $sql = " SELECT * FROM diagnostique  where service_diag = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $service_diag);
        $stmt->execute();
        $rst = $stmt->get_result();

        if ($rst->num_rows > 0) {
            while ($row = $rst->fetch_assoc()) {
                echo "service_ent : " . $row['service_diag'] . "<br>";
                echo "atelier : " . $row['atelier'] . "<br>";
                echo "dat_service : " . $row['dat_service'] . "<br>";

                echo "<br>";
            }
        }
    }
    ?>
    <a href="modifier_suppdiagnostique.php" class="btn-btn-light">modifier&&supprimer</a>
   
</body>

</html>