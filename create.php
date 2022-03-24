<?php
session_start();
if (isset($_POST['register'])){

    include "db_conn.php";

    function validate($data){
        $data=trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    // $user_data = 'name='.$name.'$email='.$email;

    if (empty($uname)){
        header("Location: index.php?error=User Name is required");
        exit();
    }else if (empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    }else{
        $sql = "INSERT INTO users(username, password) 
                VALUES('$uname', '$pass')";
        $result = mysqli_query($conn, $sql);
        if($result){
            $sql2 = "SELECT * FROM users WHERE username = '$uname' AND password= '$pass'";
            $result2 = mysqli_query($conn, $sql2);

            if(mysqli_num_rows($result2) === 1){
                $row = mysqli_fetch_assoc($result2);
                if ($row['username'] === $uname && $row['password'] === $pass) {
                    $_SESSION['user_name'] = $row['username'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: view.php");
                    exit();
                }
            }
        }else{
            header("Location: ../index.php?error=unknown error occured");
        }
    }
}