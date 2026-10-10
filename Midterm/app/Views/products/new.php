<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>">
</head>
<body>

    <h1>Add Product</h1>

    <?php if (isset($validation)): ?>
        <?= $validation->listErrors() ?>
    <?php endif; ?>

    <form action="/products/create" method="post" enctype="multipart/form-data">

        <?= csrf_field() ?>

        <label>Product Name:</label><br>
        <input type="text" name="name" value="<?= old('name') ?>">
        <br><br>

        <label>Price:</label><br>
        <input type="number" name="price" step="0.01" min="0" value="<?= old('price') ?>">
        <br><br>

        <label>Stock Quantity:</label><br>
        <input type="number" name="stock_quantity" min="0" value="<?= old('stock_quantity', 0) ?>">
        <br><br>

        <label>Product Image:</label><br>
        <input type="file" name="image" accept=".jpg,.jpeg,.png">
        <br><br>

        <button type="submit">Save Product</button>

    </form>

    <br>

    <a href="/products">Back to Products</a>

</body>
</html>