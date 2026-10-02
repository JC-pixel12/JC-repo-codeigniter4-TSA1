<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    <?= validation_list_errors() ?>

    <form method="post" enctype="multipart/form-data">
        <label>Username:</label><br>
        <input type="text" name="username" value="<?= esc($user['username']) ?>"><br><br>

        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?= esc($user['full_name']) ?>"><br><br>

        <label>Profile Picture:</label><br>
        <input type="file" name="avatar" accept=".jpg,.jpeg,.png"><br><br>
        
        <?php if(!empty($user['avatar'])): ?>
            <?= base_url('uploads/' . $user['avatar']) ?>   width="100">
        <?php endif; ?>

        <br><br>

        <button type="submit">Update</button>
    </form>
    
</body>
</html>