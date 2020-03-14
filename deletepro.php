<?php
if(isset($_POST['yes'])){
    include 'sql.php';
    $id = $_COOKIE['id'];
    $sql = "DELETE FROM Client 
    WHERE cid=$id";
    $results = mysqli_query($conn, $sql);
    if($results){
        header("Location: logout.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
