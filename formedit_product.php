<?php

if(!isset($_GET['id'])){
    header('Location: index.php?mensaje=error');
    exit();
}

include 'connection_db.php';
$id = $_GET['id'];

$query = "SELECT * FROM products WHERE ID =$id";

$products = mysqli_query($connection, $query);

?>
<?php include 'html_Beautifier/header.php' ?>
<?php
foreach ($products as $i => $product) { ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Edit product :
                    </div>
                    <form class="p-4" method="GET" action="edit_product.php">
                        <div class="mb-3">
                            <label class="form-label">Name: </label>
                            <input type="text" class="form-control" name="txtName" required
                                   value="<?php echo $product['Name']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description: </label>
                            <input type="text" class="form-control" name="txtDescription" autofocus required
                                   value="<?php echo $product['Description']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price: </label>
                            <input type="number" class="form-control" name="txtPrice" autofocus required
                                   value="<?php echo $product['Price']; ?>">
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <input type="submit" class="btn btn-primary" value="Edit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
} ?>
<?php include 'html_Beautifier/footer.php' ?>