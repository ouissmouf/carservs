<?php
$serv = '127.0.0.1';
$username = 'root';
$password = "";
$dbname = "stage";

$conn = new mysqli($serv, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>client</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}


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

    
    <p>supprition des client</p>
    <form action="" method="$_POST">
    </form>
    <?php
    $sql ="SELECT * FROM reservation_diag";
    $rst = $conn->query($sql);
    if($rst->  num_rows>0){
        while ($row = $rst-> fetch_assoc()){
            ?>
           <table border="1">
    <tr>
        <th>Nom et prénom</th>
        <th>Service diag</th>
        <th>Date de service</th>
        <th>Matricule</th>
        <th>Atelier</th>
        <th>CIN</th>
    </tr>
    <tr>
        <td><?php echo $row['nom_et_prenom']; ?></td>
        <td><?php echo $row['service_diag']; ?></td>
        <td><?php echo $row['dat_service']; ?></td>
        <td><?php echo $row['matricule']; ?></td>
        <td><?php echo $row['atelier']; ?></td>
        <td><?php echo $row['CIN']; ?></td>
    </tr>
</table>

<?php
            echo "<br>";
        }
    }
    ?>
    <?php
    $sql ="SELECT * FROM reservation_ent";
    $rst = $conn->query($sql);
    if($rst->  num_rows>0){
        while ($row = $rst-> fetch_assoc()){
            ?>
           <table border="1">
    <tr>
        <th>Nom et prénom</th>
        <th>Service ent</th>
        <th>Date de service</th>
        <th>Matricule</th>
        <th>Atelier</th>
        <th>CIN</th>
    </tr>
    <tr>
        <td><?php echo $row['nom_et_prenom']; ?></td>
        <td><?php echo $row['service_ent']; ?></td>
        <td><?php echo $row['dat_service']; ?></td>
        <td><?php echo $row['matricule']; ?></td>
        <td><?php echo $row['atelier']; ?></td>
        <td><?php echo $row['CIN']; ?></td>
    </tr>
</table>

<?php
            echo "<br>";
        }
    }
    ?>


<?php


if (isset($_POST['btsupp'])) {
    $CIN = $_POST['CIN'];

    $stmt = $conn->prepare("   DELETE FROM    reservation_diag where CIN =? ");
    $stmt->bind_param("s", $CIN);

    if ($stmt->execute()) {
        echo "Delete successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>
<?php


if (isset($_POST['btsupp'])) {
    $CIN = $_POST['CIN'];

    $stmt = $conn->prepare("   DELETE FROM    reservation_ent where CIN =? ");
    $stmt->bind_param("s", $CIN);

    if ($stmt->execute()) {
        echo "Delete successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>



<form action="" method="POST">
    <h1>supprimer </h1>
    <div class="mb-4 container">
    <label for="CIN" class="from-control">CIN</label>
    <input type="text"   class="from-label" name="CIN" required>
    </div>

    <input type="submit" name="btsupp"   class="btn btn-primary btn-block mb-4"  value="supprimer">

</form>








</body>
</html>