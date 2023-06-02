<form method="POST">
    <label>Email</label> <br>
    <input type="text" name="email"> <br>
    <label>Password</label> <br>
    <input type="password" name="password">
    <?php echo showErrors($errors ?? [], 'password'); ?>
    <br>
    <input type="submit" name="login" value="login">
</form>