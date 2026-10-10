<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Customer</title>
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
        <h1>Add New Customer</h1>

        <?php if (isset($validation)): ?>
            <div class="errors">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="/customer/create" method="post">
            <?= csrf_field() ?>

            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" id="full_name" value="<?= old('full_name') ?>">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= old('email') ?>">

            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="<?= old('phone') ?>">

            <button type="submit">Create Customer</button>
        </form>
    </div>
</body>
</html>