<?php
$catid=$cid=$pname=$pwhy=$cond=$desb=$disctpct=$price=$pdate=$prodimg=$instock=$hitname=$hemail=$gender=$request=$rate=$exotype=$protypeid=$exoid=$protypename=$grade=$gram=$stype=$wtype="";
if(isset($_POST['post'])){
	include 'sql.php';

	$catid = mysqli_real_escape_string($conn, $_POST['ncat']);
	$cid = mysqli_real_escape_string($conn, $_COOKIE['id']);
	$pname = mysqli_real_escape_string($conn, $_POST['npname']);
	$pwhy = mysqli_real_escape_string($conn, $_POST['nwhy']);
	$cond = mysqli_real_escape_string($conn, $_POST['ncon']);
	$desb = mysqli_real_escape_string($conn, $_POST['ndesc']);
	$disctpct = mysqli_real_escape_string($conn, $_POST['ndsct']);
	$price = mysqli_real_escape_string($conn, $_POST['nprice']);
	$pdate = date('Y-m-d H:i:s');
    $prodimg = $_POST['npic'];
	$instock = mysqli_real_escape_string($conn, $_POST['nstock']);
	
	switch($catid){
		case '1':
			$hitname = mysqli_real_escape_string($conn, $_POST['nhname']);
			$hemail = mysqli_real_escape_string($conn, $_POST['nhemail']);
			$gender = mysqli_real_escape_string($conn, $_POST['nhg']);
			$request = mysqli_real_escape_string($conn, $_POST['nhr']);
			$req = mysqli_real_escape_string($conn, $_POST['nhreq']);
			$rate = mysqli_real_escape_string($conn, $_POST['nhrate']);
			break;
		case '2':
			$exotype = mysqli_real_escape_string($conn, $_POST['nstocnetypek']);
			$protypename = mysqli_real_escape_string($conn, $_POST['ptype']);
			break;
		case '3':
			$grade = mysqli_real_escape_string($conn, $_POST['nsgrade']);
			$gram = mysqli_real_escape_string($conn, $_POST['nsgrams']);
			$stype = mysqli_real_escape_string($conn, $_POST['nstype']);
			break;
		case '4':
			$wtype = mysqli_real_escape_string($conn, $_POST['nwtype']);
			break;
	}
	
    $sql = "SELECT * FROM Product JOIN Category AS C ON catid=C.catid AND catid='$catid' AND cid='$cid'";
	$results = mysqli_query($conn, $sql) or die($conn->error);
  if ($results) {
	
    $q = "INSERT INTO Product ()";
    $r = mysqli_query($conn, $q) or die($conn->error);
    $value = mysqli_fetch_assoc($r);
    
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
