<?php
if(empty($_POST["oculto"]) || empty($_POST["txtName"]) || empty($_POST["txtDescription"]) || empty($_POST["txtPrice"])){
    header('Location: index.php?message=empty');
    exit();
}
include 'connection_db.php';

$name = $_POST["txtName"];
$description = $_POST["txtDescription"];
$price = $_POST["txtPrice"];

$query = sprintf("INSERT INTO products(name, description, price) VALUES ('%s','%s',%u)", $name, $description, $price);
$result = mysqli_query($connection, $query);


if ($result === TRUE) {
    header('Location: index.php?message=registered');
} else {
    header('Location: index.php?message=error');
    exit();
}

?>