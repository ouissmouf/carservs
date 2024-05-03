<?php
session_start(); // Démarre une nouvelle session ou reprend une session existante

// Connexion à la base de données
$serv = '127.0.0.1';
$username = 'root';
$password = "";
$dbname = "stage";

$conn = new mysqli($serv, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

if(isset($_POST['btcnx']) &&!empty($_POST['usernameadm']) &&!empty($_POST['pass_wordadm'])){

    $usernameadm= $_POST['usernameadm'];
    $pass_wordadm = $_POST['pass_wordadm'];

    $query = "SELECT * FROM useradm WHERE usernameadm=? AND pass_wordadm=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $usernameadm, $pass_wordadm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        $user = $result->fetch_assoc(); 
        
    
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['usernameadm'] = $user['usernameadm'];
       
        
        header("Location: homeadm.php");
        
        exit();
    } else {
       
        $_SESSION['error_message'] = "Nom d'utilisateur ou mot de passe incorrect!";
        header("Location: loginadmin.php");
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/style.css">  
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
        <a href="index.php" class="nav-item nav-link">Home</a>
        <a href="about.php" class="nav-item nav-link">About</a>
       
        <a href="login.php" class="nav-item nav-link">log in</a>
        <a href="singnup.php" class="nav-item nav-link">sing up</a>
        <a href="loginadmin.php" class="nav-item nav-link">administration</a>

  </nav>

  <h3 style="text-align: center;">log <span style="color: #6D718C;">in</span></h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="mb-4">
        <label for="usernameadm"   class="form-label" >Nom d'utilisateur:</label><br>
        <input type="text" id="usernameadm"   class="form-control" name="usernameadm" required><br>
        </div>
        <div class="mb-4">
        <label for="pass_wordadm"  class="form-label">Mot de passe:</label><br>
        <input type="password" id="pass_wordadm"    class="form-control" name="pass_wordadm" required><br><br>
</div>

        <input type="submit" value="Se connecter"   class="btn btn-primary btn-block mb-4" name="btcnx">
    </form>
</body>
</html>