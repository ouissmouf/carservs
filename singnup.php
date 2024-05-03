<?php
$serv = '127.0.0.1';
$username = 'root';
$password = "";
$dbname = "stage";

$conn = mysqli_connect($serv, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['btinsc'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass_word = $_POST['pass_word'];
    $cpassword=$_POST['cpassword'];


    if($pass_word!=$cpassword){
      echo "<script>alert('The password does not match.');</script>";
    }else{
      $sql = "INSERT into users (email,username,pass_word) VALUES ('$email','$username','$pass_word')";
      if($conn -> query($sql) ===true){

        echo "<script>alert('Data inserted successfully.');</script>";
      }else{
        echo "erro ".$conn->error;
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <title>login</title>
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


    <h3 style="text-align: center;">singn <span style="color: #6D718C;">up</span></h3>
   <form action="" method="POST" id="singnup">
      <div class="mb-4">
         <label for="email" class="form-label">Email address</label>
         <input type="email" class="form-control" name="email" required>
         <div class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-4">
         <label for="username" class="form-label">Username</label>
         <input type="text" class="form-control" name="username" required>
      </div>
      <div class="mb-4">
         <label for="pass_word" class="form-label">Password</label>
         <input type="password" class="form-control" name="pass_word" required>
      </div>
      <div class="mb-3">
         <label for="cpassword" class="form-label">Confirm Password</label>
         <input type="password" class="form-control" name="cpassword">
      </div>
      <button type="submit" name="btinsc" class="btn btn-primary btn-block mb-4">Sign Up</button>
   </form>

   <script src="js/main.js"></script>
</body>
</html>
