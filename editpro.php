<?php
session_start();
if(isset($_POST['save'])){
  include 'sql.php';
  $email = mysqli_real_escape_string($conn, $_POST['eemail']);
  $uname = mysqli_real_escape_string($conn, $_POST['euser']);
  $fname = mysqli_real_escape_string($conn, $_POST['efname']);
  $lname = mysqli_real_escape_string($conn, $_POST['elname']);
  $opass = mysqli_real_escape_string($conn, $_POST['oldpass']);
  $npass = mysqli_real_escape_string($conn, $_POST['nepass']);
  $oemail = $_SESSION['email'];
  if($opass == $npass){
    die("Both passwords are the same");
  }
  $sql = "UPDATE Client
   SET email='$email',
   username='$uname',
   fname='$fname',
   lname='$lname',
   passwd='$npass',
   WHERE email='$oemail'";

  $results = mysqli_query($conn, $sql) or die($conn->error);

  if ($results) {
      setcookie("passwd", $npass, time() + (86400 * 30));
      $_SESSION["email"] = $email;
      $_SESSION["user"] = $uname;
      $_SESSION["first"] = $fname;
      $_SESSION["last"] = $lname;
      $_SESSION["logged"] = true;

  	  header('Location: profile.php');
      exit();
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
