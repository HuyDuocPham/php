<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .form-login {
        text-align: center;
        padding-top: 200px;
    }
</style>

<body>
    <?php
    require_once('database.php');
    if (isset($_POST['login'])) {
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;
        $password = sha1($password . 'huyduocphamm!@#$%#');
        $sql = "select * from users where username = '" . $username . "' and password = '" . $password . "'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            $_SESSION['username'] = $username;
            // echo "user co trong he thong";
        } else {
            echo "Ten dang  nhap hoac mat khau sai!";
        }
    }

    if (isset($_POST['dangxuat'])) {
        session_unset();
    }

    if (isset($_GET['lang'])) {
        setcookie('lang', $_GET['lang'], time() + 86400);
        $_COOKIE['lang'] = $_GET['lang'];
    }

    echo $password;


    ?>
    <?php if (!isset($_SESSION['username'])) { ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-login">
            <input type="text" name="username" placeholder="Email addresss or phone number"> <br>
            <input type="password" name="password" placeholder="Password"> <br>
            <input type="submit" value="Log In" name="login">
        </form>
    <?php } else { ?>
        <a href="?lang=vi"><img
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Vietnam.svg/225px-Flag_of_Vietnam.svg.png"
                alt="" width="50" height="25"></a>
        <a href="?lang=en"><img
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg/220px-Flag_of_the_United_Kingdom_%283-5%29.svg.png"
                alt="" width="50" height="25"></a>

        <?php
        $string = "Xin chao";
        if (isset($_COOKIE['lang'])) {
            match ($_COOKIE['lang']) {
                'en' => $string = "Welcome",
                'vi' => $string = "Xin chao",
                default => $string = "Xin chao",
            };
        }
        echo $string;
        ?>

        <?php echo $_SESSION['username']; ?>
        <form action="" method="POST">
            <input type="submit" name="dangxuat" value="Damg Xuat">
        </form>
    <?php } ?>
</body>