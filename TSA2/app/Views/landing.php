<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>
<body>
    <h1>Welcome to the Today Task Management System</h1>

    <nav>
        <a href="<?= base_url('/') ?>">Welcome</a> 
        <a href="<?= base_url('/about') ?>">About</a> 
        <a href="<?= base_url('/tasks') ?>">Tasks</a>
        <a href="<?= base_url('/users') ?>">Users</a>
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