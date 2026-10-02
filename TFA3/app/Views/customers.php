<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
</head>
<body>
    <h1>Customer Accounts</h1>

    <nav>
        <ul>
            <li><a href="<?= base_url('landing') ?>">Home</a></li>
            <li><a href="<?= base_url('about') ?>">About</a></li>
            <li><a href="<?= base_url('customers') ?>">Customers</a></li>
            <li><a href="<?= base_url('users') ?>">Users</a></li>
        </ul>
    </nav>

    <table border="1" cellpadding="5">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?= $customer['full_name'] ?></td>
                <td><?= $customer['email'] ?></td>
                <td><?= $customer['phone'] ?></td>
                <td>
                    <a href="<?= base_url('customers/edit/' . $customer['id']) ?>">Edit</a>
                    <a href="<?= base_url('customers/delete/' . $customer['id']) ?>" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>