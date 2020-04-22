<?php
if(isset($_POST['getemail'])){
  include 'sql.php';
  $email = mysqli_real_escape_string($conn, $_POST['getemail']);
  $sql = "SELECT * from Client WHERE email='$email' limit 1";

  $results = mysqli_query($conn, $sql) or die($conn->error);
  $value = mysqli_fetch_assoc($results);
  if ($results) {
        $to = $email;
        $subject = "Password Reset Request for ".$value['username'];
        
        
        // compose headers
        $headers = array(
            "From" => "admin@underground.onion\r\n",
            "Reply-To" => $email."\r\n",
            "X-Mailer" => "PHP/".phpversion(),
            "MIME-Version" => "1.0\r\n",
            "Content-type" => "text/html; charset=iso-8859-1\r\n"

        );
        
        $message = "Hi ".$value['username'].",\n\nYou have requested the reset password. Here ya go: <a href='http://vconroy.cs.uleth.ca/~azua3660/pass.php'>http://vconroy.cs.uleth.ca/~azua3660/pass.php</a>\n\nFrom,\nThe Council Of Underground";
        
        $message = wordwrap($message, 70, "\r\n");
        
        mail($to, $subject, $message, $headers);

  	    header('Location: pass.php');
        exit();
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
