<?php
if(isset($_POST['login'])){
  include 'sql.php';
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $user = mysqli_real_escape_string($conn, $_POST['user']);
  $pass = mysqli_real_escape_string($conn, $_POST['pass']);
  $sql = "SELECT * from Client WHERE username='$user' limit 1";

  $results = mysqli_query($conn, $sql) or die($conn->error);
  $value = mysqli_fetch_assoc($results);
  if ($results) {
        $fname = mysqli_real_escape_string($conn, $value['fname']);
        $lname = mysqli_real_escape_string($conn, $value['lname']);
        setcookie("id", $value['cid'], time()+3600);
        setcookie("email", $email, time()+3600);
        setcookie("passwd", $pass,  time()+3600);
        setcookie("user", $user, time()+3600);
        setcookie("first", $fname, time()+3600);
        setcookie("last", $lname, time()+3600);
        setcookie("logged", true, time()+3600);
  	    header('Location: index.php');
        exit();
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
