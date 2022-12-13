<?php
if(!isset($_GET['id'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include ('connection_db.php');

$id = $_GET['id'];

$query = "DELETE FROM products WHERE id = $id";

$result = mysqli_query($connection, $query);


if ($result === TRUE) {
    header('Location: index.php?message=removed');
} else {
    header('Location: index.php?message=error');
}

?>