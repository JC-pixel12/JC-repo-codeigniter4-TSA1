<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>">
</head>
<body>

    <h1>Edit Product</h1>

    <?php if (isset($validation)): ?>
        <?= $validation->listErrors() ?>
    <?php endif; ?>

    <form
        action="/products/update/<?= $product['id'] ?>"
        method="post"
        enctype="multipart/form-data"
    >

        <?= csrf_field() ?>

        <label>Product Name:</label><br>

        <input
            type="text"
            name="name"
            value="<?= old('name', $product['name']) ?>"
        >

        <br><br>

        <label>Price:</label><br>

        <input
            type="number"
            name="price"
            step="0.01"
            min="0"
            value="<?= old('price', $product['price']) ?>"
        >

        <br><br>

        <label>Stock Quantity:</label><br>

        <input
            type="number"
            name="stock_quantity"
            min="0"
            value="<?= old('stock_quantity', $product['stock_quantity']) ?>"
        >

        <br><br>

        <label>Current Image:</label><br>

        <?php if (!empty($product['image'])): ?>

            <img
                src="/uploads/products/<?= esc($product['image']) ?>"
                width="150"
                alt="<?= esc($product['name']) ?>"
            >

        <?php else: ?>

            No Image

        <?php endif; ?>

        <br><br>

        <label>Replace Image:</label><br>

        <input
            type="file"
            name="image"
            accept=".jpg,.jpeg,.png"
        >

        <br><br>

        <button type="submit">Update Product</button>

    </form>

    <br>

    <a href="/products">Back to Products</a>

</body>
</html>