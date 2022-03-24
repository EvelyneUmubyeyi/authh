<?php

$sname = 'localhost';
$uname = 'root';
$password = '';
$dbname = 'testheroes';

$conn = mysqli_connect($sname,$uname,$password,$dbname);

if(!$conn){
    echo 'connection failed';
}