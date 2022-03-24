<?php
// require('db.php');
// $name=$_REQUEST['name'];
// $query = "DELETE FROM 'heroes' WHERE name=$name"; 
// $result = mysqli_query($con,$query) or die (mysqli_error());
// header("Location: view.php"); 
?>

<?php
//     require('db.php');

//     $query = 
//     mysqli_query($conn, "DELETE FROM heroes WHERE name='$_REQUEST[name]'") or die(mysqli_error());
//     header("location:view.php");
// ?>

<?php
 require_once 'db.php';
 mysqli_query($con, "DELETE FROM heroes WHERE name='$_REQUEST[name]'") or die(mysqli_error());

header("Location: view.php"); 

?>