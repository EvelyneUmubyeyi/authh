<?php
session_start();
include('db_conn.php');
if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['role'])) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> 
| <a href="logout.php">Logout</a></p>
<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Hero Name</strong></th>
<th><strong>Real Name</strong></th>
<th><strong>Short Bio</strong></th>
<th><strong>Long Bio</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
// $count variable used to increment the records in the table
$count=1;

$sel_query="Select * from heroes;";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<a href="delete.php?name=<?php echo $row["hero_name"]; ?>">*</a>
<td align="center"><img src="https://www.pngitem.com/pimgs/m/421-4212341_default-avatar-svg-hd-png-download.png" width=50px
length= 50px><br><?php echo $row["hero_name"]; ?></td>
<td align="center"><?php echo $row["real_name"]; ?></td>
<td align="center"><?php echo $row["short_bio"]; ?></td>
<td align="center"><?php echo $row["long_bio"]; ?></td>
<?php if ($_SESSION['role'] === 'admin'){ ?>
<td align="center">
<a href="edit.php?name=<?php echo $row["hero_name"]; ?>">Update</a>
</td>
<td align="center">
<a href="delete.php?name=<?php echo $row["hero_name"]; ?>">Delete</a>
</td>
<?php } ?>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
?>