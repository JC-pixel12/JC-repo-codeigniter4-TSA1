<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Login</title>
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

        <h1>POS Login</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="success">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>

        <?php if (isset($validation)): ?>
            <div class="error">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="/login" method="post">
            <?= csrf_field() ?>

            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= old('username') ?>" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Login</button>

        </form>

    </div>
</body>
</html>