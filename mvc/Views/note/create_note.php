<h1>Create Note</h1>
<form action="" method="POST">
    <label>Content</label> <br>
    <textarea cols="30" rows="10" name="content"></textarea> <br>
    <?php echo showErrors($errors ?? [], 'user_id'); ?>
    <select name="user_id">
        <option value="0">-- Select options --</option>
        <?php foreach ($users as $key => $user): ?>
            <option value="<?= $user['id'] ?>"><?= $user['id'] . '-' . $user['name'] ?></option>
        <?php endforeach ?>
    </select> <br>
    <?php echo showErrors($errors ?? [], 'user_id'); ?>
    <input type="submit" value="Create" name="create_note">
</form>