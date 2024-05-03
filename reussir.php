
<?php
$serv = '127.0.0.1';
$username = 'root';
$password = "";
$dbname = "stage";

$conn = new mysqli($serv, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function nomdecompte() {
    
    session_start();
  
    if(isset($_SESSION['username'])) {
      
        $nom_compte = $_SESSION['username'];
        return $nom_compte;
    } else {
       
        return "Session non trouvée. Veuillez vous connecter.";
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
 font-family: Arial, sans-serif;
 margin: 0;
 padding: 0;
 background-color: #f0f0f0;
}

.container {
 width: 80%;
 margin: 0 auto;
 text-align: center;
}

.thank-you {
 font-size: 2rem;
 color: #333;
 margin-top: 5rem;
}

.message {
 font-size: 1.2rem;
 color: #333;
 margin-top: 2rem;
}
</style>
</head>
<body>
<div class="container">
 <div class="thank-you">Thank you <?php echo nomdecompte() ?></div>
 <div class="message">
 We are thrilled that you have chosen our service. We are committed to providing you with the best possible experience and look forward to working with you.
 </div>
</div>
</body>
</html>

