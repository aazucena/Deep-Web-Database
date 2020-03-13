
<?php
session_start();
if(isset($_POST['signin'])){
  include 'sql.php';
  $email = mysqli_real_escape_string($conn, $_POST['nemail']);
  $uname = mysqli_real_escape_string($conn, $_POST['nuser']);
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $npass = mysqli_real_escape_string($conn, $_POST['npass']);
  $cpass = mysqli_real_escape_string($conn, $_POST['cpass']);
  $sql = "INSERT INTO Client(email, username, passwd, fname, lname)
  VALUES ('$email', '$uname', '$npass', '$fname', '$lname')";

  $results = mysqli_query($conn, $sql) or die($conn->error);
  if ($results) {
      setcookie("email", $email, time()+3600);
      setcookie("user", $uname, time()+3600);
      setcookie("first", $fname, time()+3600);
      setcookie("last", $lname, time()+3600);
      setcookie("passwd", $npass,  time()+3600);
      setcookie("logged", true, time()+3600);
  	  header('Location: index.php');
      exit();
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
else{
  die("What?");
}
?>
