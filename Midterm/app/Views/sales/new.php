<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Sale</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
    <nav>
        <a href="/products">Products</a> |
        <a href="/customers">Customers</a> |
        <a href="/users">Staff</a> |
        <a href="/sales">Sales History</a> |
        <a href="/logout">Logout</a>
    </nav>

    <h1>Record Sale</h1>

    <hr>

    <?php if (session()->getFlashdata('error')): ?>
        <p>
            <strong>
                <?= esc(session()->getFlashdata('error')) ?>
            </strong>
        </p>
    <?php endif; ?>

    <?php if (isset($validation)): ?>
        <?= $validation->listErrors() ?>
    <?php endif; ?>

    <form action="/sales/create" method="post">

        <?= csrf_field() ?>

        <label>Product:</label><br>

        <select name="product_id" required>

            <option value="">-- Select Product --</option>

            <?php foreach ($products as $product): ?>

                <option
                    value="<?= $product['id'] ?>"
                    <?= old('product_id') == $product['id'] ? 'selected' : '' ?>
                >
                    <?= esc($product['name']) ?>
                    -
                    ₱<?= number_format($product['price'], 2) ?>
                    -
                    Stock: <?= $product['stock_quantity'] ?>
                </option>

            <?php endforeach; ?>

        </select>

        <br><br>

        <label>Customer:</label><br>

        <select name="customer_id">

            <option value="">Walk-in Customer</option>

            <?php foreach ($customers as $customer): ?>

                <option
                    value="<?= $customer['id'] ?>"
                    <?= old('customer_id') == $customer['id'] ? 'selected' : '' ?>
                >
                    <?= esc($customer['full_name']) ?>
                </option>

            <?php endforeach; ?>

        </select>

        <br><br>

        <label>Quantity:</label><br>

        <input type="number" name="quantity" min="1" value="<?= old('quantity', 1) ?>" required>

        <br><br>

        <button type="submit">Record Sale</button>

    </form>

    <br>

    <a href="/sales">Back to Sales</a>

</body>
</html>