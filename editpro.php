<?php
if(isset($_POST['save'])){
  include 'sql.php';
  $email = mysqli_real_escape_string($conn, $_POST['eemail']);
  $uname = mysqli_real_escape_string($conn, $_POST['euser']);
  $fname = mysqli_real_escape_string($conn, $_POST['efname']);
  $lname = mysqli_real_escape_string($conn, $_POST['elname']);
  $opass = mysqli_real_escape_string($conn, $_POST['oldpass']);
  $npass = mysqli_real_escape_string($conn, $_POST['nepass']);
  $oemail = $_COOKIE['email'];
  $passql = "SELECT * FROM Client WHERE passwd='$opass'";
  if($opass == $_COOKIE['passwd']){
    if($npass !== $opass){
      $id=$_COOKIE['id'];
      $sql = "UPDATE Client SET email='$email',
       username='$uname',
        fname='$fname',
         lname='$lname',
          passwd='$npass'
           WHERE cid=$id";
      $results = mysqli_query($conn, $sql);

      if ($results) {
          unset($_COOKIE['logged']);
          unset($_COOKIE['email']);
          unset($_COOKIE['user']);
          unset($_COOKIE['first']);
          unset($_COOKIE['last']);
          unset($_COOKIE['passwd']);
          setcookie("email", $email, time()+3600);
          setcookie("user", $uname, time()+3600);
          setcookie("first", $fname, time()+3600);
          setcookie("last", $lname, time()+3600);
          setcookie("passwd", $npass,  time()+3600);
          setcookie("logged", true, time()+3600);
      	  header('Location: profile.php');
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          #header('Location: profile.php');
      }
    }
    else{
        die("Both passwords are the same");
        #header('Location: profile.php');
    }
  }
  else{
    echo "Error: " . $sql . "<br>" . $conn->error;
    die("Old password doesn't exist");
    #header('Location: profile.php');
  }
}
?>
