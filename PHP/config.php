<?php
    $hostname = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "chatter";

    $conn = mysqli_connect($hostname, $username, $password, $database);
    if(!$conn) {
        die("Error while connecting to server or Database: ".mysql_error());
    }
?>