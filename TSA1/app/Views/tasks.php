<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks Page</title>
</head>
<body>
    <h1>Tasks</h1>

    <nav>
        <ul>
            <li><a href="<?= base_url('/') ?>">Home</a></li>
            <li><a href="<?= base_url('about') ?>">About</a></li>
            <li><a href="<?= base_url('tasks') ?>">Tasks</a></li>
            <li><a href="<?= base_url('users') ?>">Users</a></li>
        </ul>
    </nav>

    <table border="1" cellpadding="5">
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Task Date</th>
            <th>Created at</th>
        </tr>
        <?php foreach ($tasks as $task) : ?>
            <tr>
                <td><?= $task['title'] ?></td>
                <td><?= $task['status'] ?></td>
                <td><?= $task['task_date'] ?></td>
                <td><?= $task['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>