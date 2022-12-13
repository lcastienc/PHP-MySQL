<?php

print_r($_POST);
if(!isset($_POST['id'])){
    header('Location: index.php?mensaje=error');
}

include 'connection_db.php';
$id = $_GET['id'];
$name = $_GET['txtName'];
$description = $_GET['txtDescription'];
$price = $_GET['txtPrice'];

$query = sprintf("UPDATE products SET name='%s', description='%s', price=%u WHERE ID=%u", $name, $description, $price, $id);
$mysqlquery = mysqli_query($connection, $query);


if ($mysqlquery === TRUE) {
    header('Location: index.php?mensaje=editado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}

?>
