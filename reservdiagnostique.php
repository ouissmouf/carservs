<?php
$serv = '127.0.0.1';
$username = 'root';
$password = "";
$dbname = "stage";

$conn = new mysqli($serv, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['reserv'])) {
    $nom_et_prenom = $_POST['nom_et_prenom'];
    $service_diag= $_POST['service_diag'];
    $dat_service = $_POST['dat_service'];
    $matricule = $_POST['matricule'];
    $atelier = $_POST['atelier'];

    $stmt = $conn->prepare("INSERT INTO diagnostique (nom_et_prenom,service_diag, dat_service, matricule , atelier) VALUES (?, ?, ?,?,?)");
    $stmt->bind_param("sssss", $nom_et_prenom, $service_diag, $dat_service, $matricule,$atelier);

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
    <title>reservation entretient</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="/css//style.css">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    form {
      border: 3px solid #f1f1f1;
    }

    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      background-color: #04AA6D;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }

    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    img.avatar {
      width: 40%;
      border-radius: 50%;
    }

    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }

   
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


  </nav>
    
  <form action="" method="POST">
    <h1>Affichage</h1>
    <div class="mb-4 container">
        <label for="service_ent" class="from-label mb-4">Service </label>
        <select name="service_diag">
            <option value="">Sélectionner un service</option>
            <option >diagnostique electrique 
</option>
<option >diagnostique de systéme de firinage 
</option>
<option>diagnostique moteur 
</option>
            <!-- Add more options here -->
        </select>
    </div>

    <input type="submit" name="affiche" class="btn btn-primary btn-block mb-4" value="Afficher">
    <a href="hommec.php" class="btn btn-primary btn-block mb-4">Annuler</a>
</form>

<?php
if (isset($_POST['affiche'])) {
    $service_diag1 = $_POST['service_diag'];

    $sql = "SELECT * FROM reservation_diag WHERE service_diag = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $service_diag1);
    $stmt->execute();
    $rst = $stmt->get_result();

    if ($rst->num_rows > 0) {
        while ($row = $rst->fetch_assoc()) {
?>
            <form method="POST" action="reussir.php">
                <label for="nom_et_prenom">Nom et prénom</label>
                <input type="text" name="nom_et_prenom" required><br>

                <label for="service_diag">Service Entretien:</label>
                <input type="text" id="service_diag" name="service_diag" value="<?php echo $row['service_diag']; ?>" readonly><br>

                <label for="atelier">Atelier:</label>
                <input type="text" id="atelier" name="atelier" value="<?php echo $row['atelier']; ?>" readonly><br>

                <label for="dat_service">Date Service:</label>
                <input type="text" id="dat_service" name="dat_service" value="<?php echo $row['dat_service']; ?>" readonly><br>

                <label for="matricule">Matricule</label>
                <input type="text" name="matricule" required><br>

                <label for="CIN">CIN</label>
                <input type="text" name="CIN" required><br>

                <input type="submit" name="reserv" value="Réserver">
            </form>
<?php
        }
    } else {
        echo "Aucun enregistrement trouvé.";
    }
}
?>


  
</body>

</html>