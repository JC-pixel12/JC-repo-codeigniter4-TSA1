<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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

    <div class="container">
        <h1>Edit User</h1>

        <?php if (isset($validation)): ?>
            <div class="errors">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="/users/update/<?= $user['id'] ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= old('username', $user['username']) ?>">
            
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" id="full_name" value="<?= old('full_name', $user['full_name']) ?>">
            
            <label>Current Avatar</label>
            <?php if (!empty($user['avatar'])): ?>
                <img src="/uploads/avatars/<?= esc($user['avatar']) ?>" alt="Current Avatar" class="avatar-preview" width="100">
            <?php else: ?>
                <img src="/images/avatar-placeholder.jpg" alt="Default Avatar" class="avatar-preview" width="100">
            <?php endif; ?>

            <label for="avatar">Profile Picture</label>
            <input type="file" name="avatar" id="avatar" accept=".jpg, .jpeg, .png">

            <small>JPG, JPEG, or PNG only, Maximum file size: 2MB.</small><br>
            <button type="submit">Update User</button>
        </form>
    </div>
</body>
</html>