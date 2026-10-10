<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales History</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/products">Products</a>
        <a href="/customers">Customers</a>
        <a href="/users">Staff</a>
        <a href="/sales/new">Record Sale</a>
        <a href="/sales">Sales History</a>
        <a href="/logout">Logout</a>
    </nav>

    <h1>Sales History</h1>

    <hr>

    <?php if (session()->getFlashdata('success')): ?>

        <p>
            <strong>
                <?= esc(session()->getFlashdata('success')) ?>
            </strong>
        </p>

    <?php endif; ?>

    <table border="1" cellpadding="8">

        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Customer</th>
                <th>Staff</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>

        <?php foreach ($sales as $sale): ?>

            <tr>
                <td><?= esc($sale['id']) ?></td>
                <td><?= esc($sale['product_name']) ?></td>
                <td>
                    <?= esc($sale['customer_name'] ?? 'Walk-in Customer') ?>
                </td>
                <td><?= esc($sale['staff_name']) ?></td>
                <td><?= esc($sale['quantity']) ?></td>
                <td>
                    ₱<?= number_format($sale['total_price'], 2) ?>
                </td>
                <td><?= esc($sale['created_at']) ?></td>
            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</body>
</html>