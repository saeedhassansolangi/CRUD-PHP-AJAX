<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "ajax-lab";

$connection = mysqli_connect($servername, $username, $password, $db);
if (!$connection) {
    die("connection failed" . mysqli_connect_error());
}

//echo "Connected successfully";