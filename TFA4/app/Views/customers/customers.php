<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
    <nav>
        <a href="<?= "/" ?>">Home</a>
        <a href="<?= "/about" ?>">About</a>
        <a href="<?= "/customers" ?>">Customers Accounts</a>
        <a href="<?= "/users" ?>">Users Accounts</a>

        <?php if (session()->get('isLoggedIn')): ?>

        <span>
            Logged in as:
            <?= esc(session()->get('username')) ?>
        </span>

        <a href="/logout">Logout</a>

    <?php endif; ?>
    </nav>

    <h1>Customer Accounts</h1>
    
    <div class="container">
        <table>
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
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>