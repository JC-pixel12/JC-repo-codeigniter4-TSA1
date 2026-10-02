<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <h1>User Accounts</h1>

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
            <th>Avatar</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Created_at</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td>
                    <?php if(!empty($user['avatar'])): ?>
                        <img src="<?= base_url('uploads/' . $user['avatar']) ?>"width="80" height="80">
                    <?php else: ?>
                        <img src="<?= base_url('images/placeholder.jpg') ?>" width="80" height="80">
                    <?php endif; ?>
                </td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['full_name'] ?></td>
                <td><?= $user['created_at'] ?></td>
                <td>
                    <a href="<?= base_url('users/edit/' . $user['id']) ?>">Edit</a>
                    <a href="<?= base_url('users/delete/' . $user['id']) ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>