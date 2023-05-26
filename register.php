<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <head>
        <h1>
            <?php
            // require('header.php'); // insert 1 header.php 
            // require_once('header.php'); //require_once insert duy nhat 1 file header.php
            ?>
        </h1>
    </head>

    <?php
    $msg = [];
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        if (empty($username)) {
            $msg[] = "Username is required";
        }
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $msg[] = "Invalid email format";
        }

        $password = $_POST['password'];
        if (empty($password)) {
            $msg[] = "Password is required";
        } else if (trim(strlen($password) < 6)) {
            $msg[] = "Password at least 6 character";
        }

        $confirm_password = $_POST['confirm_password'];
        if (empty($confirm_password) || $confirm_password !== $password) {
            $msg[] = "Confirm password don't macth!";
        }

        if ($_FILES['avatar_url']) {
            $target_dir = "uploads/";
            $baseFileName = uniqid(true) . '_' . basename($_FILES["avatar_url"]["name"]);
            $target_file = $target_dir . $baseFileName;
            //huyduoc/pham/hinh-anh.png... basename(); #==> hinh-anh.png
            // hinh-anh.png ... uniqid(true) ==> fghhgh23h21h3kj21h321_hinh-anh.png #==> Khong bi trung ten anh(DUY NHAT) 
            //: uniqid(): 15 char, uniqid(true): 23-25 char
            if (move_uploaded_file($_FILES["avatar_url"]["tmp_name"], $target_file)) {
                echo "Upload thanh cong.<br>";
            } else {
                echo "Upload that bai.<br>";
            }
        }

        if (!count($msg)) {
            //validate Done
            echo $username . '_' . $password . '_' . $confirm_password . "<br>";
            $password = sha1($password . 'huyduocphamm!@#$%#');
            //Save data into Database
            // mysql: table user(id, username, password, created_at)
            //1-nguyenvana@gmail.com - 123123-2023/05/05 20:30:00
    
            require_once('database.php');
            // Check connection;
            if (!$conn) {
                die("Connection failed" . mysqli_connect_error());
            }
            $date = date('Y-m-d H:i:s'); // format theo database huyduocphamm da tao
            $sql = sprintf("INSERT INTO users VALUES (null, '%s', '%s', '%s', '%s')", $username, $password, $baseFileName, $date);
            if ($conn->query($sql) === true) {
                echo "New record created successfully <br>";
            } else {
                echo "Error" . $sql . "<br>" . $conn->error;
            }

            // cryption + salt
            //1: 1 chieu: 
            //md5, sha1..
            //2: 2 chieu:
    
        }
    }
    echo '<pre>';
    ?>
    <div style="color: red;">
        <ul>
            <?php foreach ($msg as $m) { ?>
                <li>
                    <?= $m ?>
                </li>
            <?php } ?>
        </ul>
    </div>
    <!--  enctype="multipart/form-data: sử dụng hình ảnh -->
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data"> 
        <input type="text" name="username" placeholder="Email addresss or phone number">
        <br>
        <input type="password" name="password" placeholder="Password"> <br>
        <input type="password" name="confirm_password" placeholder="Confirm Password"> <br>
        <input type="file" name="avatar_url" placeholder="Avatar"> <br>
        <input type="submit" value="Sign Up" name="register">
    </form>

    <footer>
        <?php
        //include('footer.php');
        //include_once('footer.php');
        ?>
    </footer>
</body>