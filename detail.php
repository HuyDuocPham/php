<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>

<body>
    <h2>Đăng ký tài khoản</h2>

    <?php
    require_once('database.php');
    if (isset($_GET['id'])) {
        $sql = 'SELECT * from users where id =' . $_GET['id'];
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $password = $row['password'];
    }

    if(isset($_POST['update'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = sha1($password . 'huyduocphamm!@#$%#');
    }

    $baseFileName = null;
    if (isset($_FILES['avatar_url']) && !empty($_FILES['avatar_url']['tmp_name'])) {
        // add new image into storage
        $target_dir = "uploads/";
        $baseFileName = uniqid(true) . '_' . basename($_FILES["avatar_url"]["name"]);
        $target_file = $target_dir . $baseFileName;

        if (move_uploaded_file($_FILES["avatar_url"]["tmp_name"], $target_file)) {
            echo "Upload thanh cong.<br>";
        } else {
            echo "Upload that bai.<br>";
        }
    }

    //check duplicate entry data
    if (!is_null($baseFileName)) {
        $sql = "UPDATE users SET username ='" . $username . "', password ='" . $password . "', image_url = '" . $baseFileName . "' WHERE id =" . $_POST['id'];
    } else {
        $sql = "UPDATE users SET username ='" . $username . "', password ='" . $password . "' WHERE id = " . $_POST['id'];
    }

    $result = mysqli_query($conn, $sql);
    echo $result ? "Update thanh cong" : "Update that bai";
    ?>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <input value="<?php echo $username ?? ''; ?>" type="text" name="username"
            placeholder="Email addresss or phone number">
        <br>
        <input type="password" name="password" placeholder="Password"> <br>
        <input type="password" name="confirm_password" placeholder="Confirm Password"> <br>
        <input type="file" name="avatar_url" placeholder="Avatar"> <br>
        <input type="submit" value="Update" name="update">
    </form>

</body>