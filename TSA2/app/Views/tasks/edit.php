<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>

<h1>Edit Task</h1>

<?php if (session()->getFlashdata('errors')): ?>

    <ul>
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<form
    action="<?= base_url('/tasks/update/' . $task['id']) ?>"
    method="post"
>

    <?= csrf_field() ?>

    <p>
        <label>Title</label><br>

        <input
            type="text"
            name="title"
            value="<?= old('title', $task['title']) ?>"
            required
        >
    </p>

    <p>
        <label>Status</label><br>

        <select name="status">

            <option
                value="pending"
                <?= $task['status'] === 'pending' ? 'selected' : '' ?>
            >
                Pending
            </option>

            <option
                value="finished"
                <?= $task['status'] === 'finished' ? 'selected' : '' ?>
            >
                Finished
            </option>

        </select>
    </p>

    <p>
        <label>Task Date</label><br>

        <input
            type="date"
            name="task_date"
            value="<?= old('task_date', $task['task_date']) ?>"
            required
        >
    </p>

    <button type="submit">Update Task</button>

</form>

<p>
    <a href="<?= base_url('/tasks') ?>">Back to Tasks</a>
</p>

</body>
</html>