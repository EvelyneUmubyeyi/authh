<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Register</title>
</head>
<body>
    <form action="create.php" method="post">
        <h2>REGISTER</h2>
        <?php if (isset($_GET['error'])){ ?>
            <p class="error">
                <?php echo $_GET['error']; ?>
            </p>
        <?php } ?>
        <label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>
     	<input type="password" name="password" placeholder="password"><br>

         <button type="submit" name="register">Register</button>
    </form>
</body>
</html>