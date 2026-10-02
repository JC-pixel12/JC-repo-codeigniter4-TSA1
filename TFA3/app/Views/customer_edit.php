<h1>Edit Customer</h1>

<?= validation_list_errors() ?>

<form method="post">
    <label>Full Name:</label><br>
    <input type="text" name="full_name" value="<?= esc($customer['full_name']) ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= esc($customer['email']) ?>"><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" value="<?= esc($customer['phone']) ?>"><br><br>
    
    <button type="submit">Update</button>
</form>