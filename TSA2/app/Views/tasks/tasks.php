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
        <a href="<?= base_url('/') ?>">Welcome</a> 
        <a href="<?= base_url('/about') ?>">About</a> 
        <a href="<?= base_url('/tasks') ?>">Tasks</a>
        <a href="<?= base_url('/users') ?>">Users</a>

        <?php if (session()->get('isLoggedIn')): ?>

            | <a href="<?= base_url('/tasks/new') ?>">New Task</a>
            | <a href="<?= base_url('/logout') ?>">Logout</a>

        <?php else: ?>

            | <a href="<?= base_url('/login') ?>">Login</a>

        <?php endif; ?>
    </nav>

    <hr>

    <?php if (session()->getFlashdata('success')): ?>

        <p style="color: green;">
            <?= esc(session()->getFlashdata('success')) ?>
        </p>

    <?php endif; ?>

    <?php if (empty($tasks)): ?>

        <p>No active tasks found.</p>

    <?php else: ?>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Task Date</th>
                <th>Created at</th>
                <?php if (session()->get('isLoggedIn')): ?>
                    <th>Actions</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($tasks as $task) : ?>
                <tr>
                    <td><?= $task['title'] ?></td>
                    <td><?= $task['status'] ?></td>
                    <td><?= $task['task_date'] ?></td>
                    <td><?= $task['created_at'] ?></td>

                    <?php if (session()->get('isLoggedIn')): ?>

                        <td>
                            <a href="<?= base_url('/tasks/edit/' . $task['id']) ?>">
                                Edit
                            </a>

                            <form
                                action="<?= base_url('/tasks/delete/' . $task['id']) ?>"
                                method="post"
                                style="display:inline;">

                                <?= csrf_field() ?>

                                <button type="submit" onclick="return confirm('Archive this task?')">
                                    Delete
                                </button>
                            </form>
                        </td>

                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
</body>
</html>