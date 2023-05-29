<h1>Update Note</h1>
<form action="" method="POST">
    <label>Content</label> <br>
    <textarea cols="30" rows="10" name="content"><?= $note['content'] ?></textarea> <br>
    <?php echo showErrors($errors ?? [], 'user_id'); ?>
    <select name="user_id">
        <option value="0">-- Select options --</option>
        <option value="1" <?php echo $note['user_id'] == 1 ? 'selected' : '' ?>>1. Nguyen Van A</option>
        <option value="2" <?php echo $note['user_id'] == 2 ? 'selected' : '' ?>>2. Nguyen Van B</option>
        <option value="3" <?php echo $note['user_id'] == 3 ? 'selected' : '' ?>>3. Nguyen Van C</option>
    </select> <br>
    <?php echo showErrors($errors ?? [], 'user_id'); ?>
    <input type="submit" value="Update" name="create_note">
</form>