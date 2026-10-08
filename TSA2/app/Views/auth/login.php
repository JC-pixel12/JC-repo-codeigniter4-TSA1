<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 50px auto;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            cursor: pointer;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }

        .success {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<h1>Login</h1>

<?php if (session()->getFlashdata('error')): ?>
    <p class="error">
        <?= esc(session()->getFlashdata('error')) ?>
    </p>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <p class="success">
        <?= esc(session()->getFlashdata('success')) ?>
    </p>
<?php endif; ?>

<form action="<?= base_url('/login') ?>" method="post">

    <?= csrf_field() ?>

    <label>Username</label>
    <input
        type="text"
        name="username"
        value="<?= old('username') ?>"
        required
    >

    <label>Password</label>
    <input
        type="password"
        name="password"
        required
    >

    <button type="submit">Login</button>

</form>

<p>
    Demo account:
    <strong>admin</strong> /
    <strong>admin123</strong>
</p>

<p>
    <a href="<?= base_url('/') ?>">Back to Welcome</a>
</p>

</body>
</html>