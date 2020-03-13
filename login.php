<?php
session_start();
if(isset($_POST['login'])){
  include 'sql.php';
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['pass']);
  $sql = "SELECT email, passwd from Client WHERE email='$email'
  AND passwd='pass'";

  $results = mysqli_query($conn, $sql) or die($conn->error);

  if ($results) {
      $_SESSION["email"] = $email;
      setcookie("passwd", $pass, time() + (86400 * 30));
      $_SESSION["logged"] = true;

  	  header('Location: index.php');
      exit();
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
