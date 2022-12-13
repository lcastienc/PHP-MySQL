<?php
//Dades de la BD per poder fer la conexió
$db_host = "localhost";
$db_name = "products";
$db_user = "root";
$db_passwd = "";

$connection = new mysqli("localhost","root","","products");

// Check connection
if ($connection -> connect_errno) {
    echo "Failed to connect to MySQL: " . $connection -> connect_error;
    exit();
}