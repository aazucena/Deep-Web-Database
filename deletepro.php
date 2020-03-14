<?php
    	include sql.php;
      $CID=$_REQUEST'cid';
      $query = "DELETE FROM Client WHERE cid=$cid";
      $results = mysqli_query($conn, $sql) or die($conn->error);

      header("Location: profile.php");
?>
