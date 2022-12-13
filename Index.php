<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP + MySQL</title>
    <style>
        body{
            padding: 50px;
        }
    </style>
</head>

<?php

$db_host = "localhost";
$db_nombre = "products";
$db_usuario = "root";
$db_passwd = "";
$connexio = mysqli_connect($db_host, $db_usuario, $db_passwd, $db_nombre);
$consulta = "SELECT * FROM PRODUCTS";

$products = mysqli_query($connexio, $consulta);

?>
<body>
<div class="card-header">
    Lista de productos
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($products as $i => $product) { ?>
        <tr>
            <th scope="row"><?php echo $product['id'] ?></th>
            <td><?php echo $product['Name'] ?></td>
            <td><?php echo $product['Description'] ?></td>
            <td><?php echo $product['Price'] ?></td>
            <td >
                <a href="form_editproduct.php?id=<?php echo $product['id'] ?>">
                    <button type="button" class="btn btn-outline-primary">Edit</button>
                </a>
                <a href="delete_product.php?id=<?php echo $product['id'] ?>">
                    <button type="button" class="btn btn-outline-danger">Delete</button>
                </a>
            </td>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>


<div class="card-header">
    Ingresar datos del nuevo producto:
</div>

<form class="p-4" method="POST" action="add_product.php">
    <div class="mb-3">
        <label class="form-label">Name: </label>
        <input type="text" class="form-control" name="txtName" autofocus required>
    </div>
    <div class="mb-3">
        <label class="form-label">Description: </label>
        <input type="text" class="form-control" name="txtDescription" autofocus required>
    </div>
    <div class="mb-3">
        <label class="form-label">Price: </label>
        <input type="number" class="form-control" name="txtPrice" autofocus required>
    </div>
    <div class="d-grid">
        <input type="hidden" name="oculto" value="1">
        <input type="submit" class="btn btn-primary" value="Registrar">
    </div>
</form>
</body>
</html>