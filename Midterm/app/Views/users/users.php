<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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

        <span>Logged in as:<?= esc(session()->get('username')) ?></span>

        <a href="/logout">Logout</a>


    </nav>

    <h1>User Accounts</h1>

    <div class="container">
        <div class="top-bar">
            <a href="/users/new" class="button">
                Add New User
            </a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="success">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td>
                            <?php if(!empty($user['avatar'])): ?>
                                <img src="/uploads/avatars/<?= esc($user['avatar']) ?>" class="avatar">
                            <?php else: ?>
                                <img src="/images/avatar-placeholder.jpg" alt="Placeholder avatar" class="avatar">
                            <?php endif; ?>
                        </td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['full_name']) ?></td>
                        <td><?= esc($user['created_at']) ?></td>
                        <td>
                            <a href="/users/edit/<?= $user['id'] ?>">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
   </div>                     
</body>
</html>