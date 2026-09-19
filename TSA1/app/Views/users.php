<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Page</title>
</head>
<body>
    <h1>Users</h1>

    <nav>
        <ul>
            <li><a href="<?= base_url('/') ?>">Home</a></li>
            <li><a href="<?= base_url('about') ?>">About</a></li>
            <li><a href="<?= base_url('customers') ?>">Customers</a></li>
            <li><a href="<?= base_url('users') ?>">Users</a></li>
        </ul>
    </nav>

    <table border="1" cellpadding="5">
        <tr>
            <th>Username</th>
            <th>Full Name</th>
            <th>Created_at</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['username'] ?></td>
                <td><?= $user['full_name'] ?></td>
                <td><?= $user['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>