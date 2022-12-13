<?php

if(!isset($_GET['id'])){
    header('Location: index.php?message=error');
    exit();
}

include ('connection_db.php');

$id = $_GET['id'];

$query = "SELECT * FROM products WHERE id =?";
$result = $query->execute([$id]);
$products = $result->fecth(FETCH_OBJ);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="form_editproduct.php">
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