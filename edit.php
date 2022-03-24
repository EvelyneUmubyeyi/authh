<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>

<?php
include('db_conn.php');
$name=$_REQUEST['hero_name'];
$hero_name =$_REQUEST['real_name'];
$short_bio =$_REQUEST['short_bio'];
$long_bio =$_REQUEST['long_bio'];
$query = "UPDATE from heroes where name='".$name."'"; 
$result = mysqli_query($conn, $query) or die (mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$name=$_REQUEST['hero_name'];
$hero_name =$_REQUEST['real_name']; 
$short_bio =$_REQUEST['short_bio'];
$long_bio =$_REQUEST['long_bio'];
$submittedby = $_SESSION["username"];
$update="update new_record set submittedby='".$submittedby."'";
mysqli_query($conn, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<p><input type="text" name="name" placeholder="Enter hero Name" 
required value="<?php echo $row['hero_name'];?>" /></p>
<p><input type="text" name="real_name" placeholder="Enter Hero's real name" 
required value="<?php echo $row['real_name'];?>" /></p>
<p><input type="text" name="short_bio" placeholder="Enter short bio" 
required value="<?php echo $row['short_bio'];?>" /></p>
<p><input type="text" name="long_bio" placeholder="Enter long bio" 
required value="<?php echo $row['long_bio'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>