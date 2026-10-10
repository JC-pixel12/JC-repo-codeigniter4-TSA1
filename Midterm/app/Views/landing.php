<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/products">Products</a>
        <a href="/customers">Customers</a>
        <a href="/users">Staff</a>
        <a href="/sales/new">Record Sale</a>
        <a href="/sales">Sales History</a>

        <?php if (session()->get('isLoggedIn')): ?>

        <span>
            Logged in as:<?= esc(session()->get('username')) ?>
        </span>

        <a href="/logout">Logout</a>

    <?php endif; ?>
    </nav>

    <h1>Welcome to the POS System</h1>
    
</body>
</html>