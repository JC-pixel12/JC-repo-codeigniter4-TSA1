<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
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
        <h1>Add New User</h1>

        <?php if (isset($validation)): ?>
            <div class="errors">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="/users/create" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= old('username') ?>">
            
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" id="full_name" value="<?= old('full_name') ?>">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= old('email') ?>">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <small>Password must be at least 8 characters long.</small>

            <label>Avatar:</label><br>
            <input type="file" name="avatar" accept=".jpg,.jpeg,.png">
            <br><br>

            <button type="submit">Create Staff Account</button>
        </form>

        <br>

        <a href="/users">Back to Staff</a>  
    </div>
</body>
</html>