<h1>New Users</h1>

<?= validation_list_errors() ?>

<form method="post">
    <label>Username:</label><br>
    <input type="text" name="username"><br><br>

    <label>Full Name:</label><br>
    <input type="text" name="full_name"><br><br>

    <label>Profile Picture:</label><br>
    <input type="file" name="avatar" accept=".jpg,.jpeg,.png"><br><br>
    
    <button type="submit">Submit</button>
</form>