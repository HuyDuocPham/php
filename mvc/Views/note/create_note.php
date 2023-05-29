<h1>Create Note</h1>
<form action="" method="POST">
    <label>Content</label> <br>
    <textarea cols="30" rows="10" name="content"></textarea> <br>
    <?php echo showErrors($errors ?? [], 'user_id'); ?>
    <select name="user_id">
        <option value="0">-- Select options --</option>
        <option value="1">1. Nguyen Van A</option>
        <option value="2">2. Nguyen Van B</option>
        <option value="3">3. Nguyen Van C</option>
    </select> <br>
    <?php echo showErrors($errors ?? [], 'user_id'); ?>
    <input type="submit" value="Update" name="create_note">
</form>