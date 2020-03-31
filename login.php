<?php
if(isset($_POST['login'])){
  include 'sql.php';
  $email = $_POST['email'];
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $sql = "SELECT * from Client WHERE username='$user' AND email='$email' AND passwd='$pass'";

  $results = mysqli_query($conn, $sql) or die($conn->error);
  $value = mysqli_fetch_assoc($results);
  $count = mysqli_num_rows($results);

  if ($count == 1) {
        $fname = mysqli_real_escape_string($conn, $value['fname']);
        $lname = mysqli_real_escape_string($conn, $value['lname']);
        setcookie("id", $value['cid'], time()+3600);
        setcookie("email", $email, time()+3600);
        setcookie("passwd", $pass,  time()+3600);
        setcookie("user", $user, time()+3600);
        setcookie("first", $fname, time()+3600);
        setcookie("last", $lname, time()+3600);
        setcookie("logged", true, time()+3600);
  } else {
    echo '<script type="text/javascript">alert("There is no such email: '.$email.', and username: '.$username.'")</script>';
  }
  	    header('Location: index.php');
        exit();
}
?>
