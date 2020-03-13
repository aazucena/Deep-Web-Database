<?php
session_start();
if(isset($_POST['login'])){
  include 'sql.php';
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['pass']);
  $sql = "SELECT * from Client WHERE email='$email'
  AND passwd='$pass' limit 1";

  $results = mysqli_query($conn, $sql) or die($conn->error);
  $value = mysql_fetch_object($results);

  if ($results) {
      setcookie("email", $email, time()+3600);
      setcookie("passwd", $pass,  time()+3600);
      setcookie("first", $value->fname, time()+3600);
      setcookie("last", $value->lname, time()+3600);
      setcookie("logged", true, time()+3600);

  	  header('Location: index.php');
      exit();
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
