<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
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
        <span>Logged in as: <?= esc(session()->get('username')) ?></span>
        <a href="/logout">Logout</a>
    </nav>
    
    <h1>Product Management</h1>

    <hr>

    <a href="/products/new">Add New Product</a>

    <?php if (session()->getFlashdata('success')): ?>
        <p><?= esc(session()->getFlashdata('success')) ?></p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <p><?= esc(session()->getFlashdata('error')) ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>

                <td>
                    <?php if (!empty($product['image'])): ?>
                        <img
                            src="/uploads/products/<?= esc($product['image']) ?>"
                            width="100"
                            height="100"
                            alt="<?= esc($product['name']) ?>"
                        >
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>

                <td><?= esc($product['name']) ?></td>

                <td>
                    ₱<?= number_format($product['price'], 2) ?>
                </td>

                <td><?= esc($product['stock_quantity']) ?></td>

                <td><?= esc($product['created_at']) ?></td>

                <td>
                    <a href="/products/edit/<?= $product['id'] ?>">
                        Edit
                    </a>

                    |

                    <a
                        href="/products/delete/<?= $product['id'] ?>"
                        onclick="return confirm('Delete this product?')"
                    >
                        Delete
                    </a>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>