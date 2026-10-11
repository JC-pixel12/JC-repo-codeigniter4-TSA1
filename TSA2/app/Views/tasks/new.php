<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Task</title>
</head>
<body>

    <h1>Create New Task</h1>

    <?php if (session()->getFlashdata('errors')): ?>

        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>

    <?php endif; ?>

    <form action="<?= base_url('/tasks/create') ?>" method="post">

        <?= csrf_field() ?>

        <p>
            <label>Title</label><br>
            <input
                type="text"
                name="title"
                value="<?= old('title') ?>"
                required
            >
        </p>

        <p>
            <label>Status</label><br>

            <select name="status">
                <option value="pending">Pending</option>
                <option value="finished">Finished</option>
            </select>
        </p>

        <p>
            <label>Task Date</label><br>
            <input
                type="date"
                name="task_date"
                value="<?= old('task_date') ?>"
                required
            >
        </p>

        <button type="submit">Create Task</button>

    </form>

    <p>
        <a href="<?= base_url('/tasks') ?>">Back to Tasks</a>
    </p>

</body>
</html>