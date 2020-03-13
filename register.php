
<?php
session_start();
if(isset($_POST['submit'])){
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
      $_SESSION["email"] = $email;
      $_SESSION["user"] = $uname;
      $_SESSION["first"] = $fname;
      $_SESSION["last"] = $lname;
      $_SESSION["logged"] = true;
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
