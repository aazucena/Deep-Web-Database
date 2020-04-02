<?php
include 'sql.php';
$cat=$cid=$pname=$pwhy=$cond=$desb=$disctpct=$price=
$pdate=$prodimg=$instock=$hitname=$hemail=$gender=$request=
$rate=$exotype=$protypeid=$exoid=$protypename=$grade=$gram=
$stype=$wtype="";

$name = $_FILES['npic']['name'];
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["npic"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST['post'])){

	$cat = mysqli_real_escape_string($conn, $_POST['ncat']);
	$cid = mysqli_real_escape_string($conn, $_COOKIE['id']);
	$pname = mysqli_real_escape_string($conn, $_POST['npname']);
	$pwhy = mysqli_real_escape_string($conn, $_POST['nwhy']);
	$cond = mysqli_real_escape_string($conn, $_POST['ncon']);
	$desb = mysqli_real_escape_string($conn, $_POST['ndesc']);
	$disctpct = mysqli_real_escape_string($conn, $_POST['ndsct']);
	$price = mysqli_real_escape_string($conn, $_POST['nprice']);
	$instock = mysqli_real_escape_string($conn, $_POST['nstock']);
	$pdate = date('m-d-Y h:i:s a', time());

	$extensions_arr = array("jpg","jpeg","png","gif");
  
	if( in_array($imageFileType,$extensions_arr) ){
		$image = addslashes(file_get_contents($_FILES['npic']['tmp_name']) );
		$sql = "INSERT INTO Product (cat, cid, pname, pwhy, cond, desb, disctpct, price, pdate, prodimg, instock)
		VALUES ('$cat', '$cid', '$pname', '$pwhy', '$cond', '$desb', '$disctpct', '$price', '$pdate', '$image', '$instock')";
		$results = mysqli_query($conn, $sql);


		if ($results) {
			$pid=0;
			$p="SELECT pid FROM Product WHERE pname='$pname' LIMIT 1";
			$result = mysqli_query($conn, $p);
			if ($row = mysqli_fetch_array($result)){
				$pid = $row['pid'];
			} 
			else {
				$pid = NULL; 
			}
			$q1 = $q2 = $r1 = $r2 = "";
			move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
			switch($cat){
				case 'H':
					$hitname = mysqli_real_escape_string($conn, $_POST['nhname']);
					$hemail = mysqli_real_escape_string($conn, $_POST['nhemail']);
					$gender = mysqli_real_escape_string($conn, $_POST['nhg']);
					$request = mysqli_real_escape_string($conn, $_POST['nhr']);
					$req = mysqli_real_escape_string($conn, $_POST['nhreq']);
					$rate = mysqli_real_escape_string($conn, $_POST['nhrate']);
					$q1 = "INSERT INTO Hitmen 
					(pid, hitname, hemail, gender, request, req, rate)
					VALUES
					('$pid', '$hitname', '$hemail', '$gender',
					 '$request', '$req', '$rate')";
					 
					$r1 = mysqli_query($conn, $q1) or die($conn->error);
					if($r1){
						header('Location: product.php?pid='.$pid.'&cat=H');
						exit();
					} else {
						echo "Error: " . $r1 . "<br>" . $conn->error;
					}
					break;
				case 'E':
					$exotype = mysqli_real_escape_string($conn, $_POST['netype']);
					$protypename = mysqli_real_escape_string($conn, $_POST['ptype']);
					$q1 = "INSERT INTO Exotics (pid, exotype) VALUES 
					('$pid', '$exotype')";
					 foreach ($_POST['ptype'] as $prname){
						$q2 = "INSERT INTO ProductType (pid, ptypename)
						VALUES ('$pid', '$prname')";
						$r2 = mysqli_query($conn, $q2) or die($conn->error);
					}
					$r1 = mysqli_query($conn, $q1) or die($conn->error);
					if($r1){
						header('Location: product.php?pid='.$pid.'&cat=E');
						exit();
					}
					break;
				case 'S':
					$grade = mysqli_real_escape_string($conn, $_POST['nsgrade']);
					$gram = mysqli_real_escape_string($conn, $_POST['nsgrams']);
					$stype = mysqli_real_escape_string($conn, $_POST['nstype']);
					$q1 = "INSERT INTO Substances 
					(pid, grade, gram, stype)
					VALUES
					('$pid', '$grade', '$gram', '$stype')";
					 
					$r1 = mysqli_query($conn, $q1) or die($conn->error);
					if($r1){
						header('Location: product.php?pid='.$pid.'&cat=S');
						exit();
					} else {
						echo "Error: " . $r1 . "<br>" . $conn->error;
					}
					break;
				case 'W':
					$wtype = mysqli_real_escape_string($conn, $_POST['nwtype']);
					$q1 = "INSERT INTO Weapons 
					(pid, wtype)
					VALUES
					('$pid', '$wtype')";
					$r1 = mysqli_query($conn, $q1) or die($conn->error);
					if($r1){
						header('Location: product.php?pid='.$pid.'&cat=W');
						exit();
					} else {
						echo "Error: " . $r1 . "<br> lol" . $conn->error;
					}
					break;
			}
		}
		else{
			echo "Error: " . $sql . "<br>" .$pid. "<br>".$name."<br>". $conn->error;
			echo $cat."<br>".$cid."<br>".$pname."<br>".$pwhy."<br>".$cond."<br>".$desb."<br>".$disctpct."<br>".$price."<br>".
			$pdate."<br>".$image."<br>".$instock;
		}
		header('Location: index.php');
		exit();
	} else {
		echo 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
	}
}
else{
  die("What?");
}
?>
