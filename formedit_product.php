<?php
if (isset($_GET['id'])) {
    $myid = $_GET['id'];
}
include 'connection_db.php';
$id = $_GET['id'];
$name = $_GET['txtName'];
$description = $_GET['txtDescription'];
$price = $_GET['txtPrice'];

$query = "UPDATE products SET name = '$name', description = '$description', price = '$price' where id = '$id'";

$db_host = "localhost";
$db_name = "products";
$db_user = "root";
$db_passwd = "";

$connection = new mysqli("localhost","root","","products");
$products = mysqli_query($connection, $query);


?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="GET" action="edit_product.php">
                    <div class="mb-3">
                        <label class="form-label">Name: </label>
                        <input type="text" class="form-control" name="txtName" required
                               value="<?php echo $products['Name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description: </label>
                        <input type="text" class="form-control" name="txtDescription" autofocus required
                               value="<?php echo products['Description']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price: </label>
                        <input type="number" class="form-control" name="txtPrice" autofocus required
                               value="<?php echo products['Price']; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo products['id']; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<a href="./index.php">Back</a>