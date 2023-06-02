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

<body>

    <h1>Trang Chủ</h1>

    <?php
    define('URL', 'http://localhost/php/mvc/index.php');
    require './Helpers/helper.php';
    require './Controllers/BaseController.php';
    require './Core/App.php';
    require './Core/Database.php';
    require './Models/BaseModel.php';
    $db = new Database;
    $connect = $db->connect();
    $app = new App;

    ?>


    <a href="index.php?url=user/index">List User</a><br>
    <a href="index.php?url=user/create">Create User</a><br>
    <a href="index.php?url=user/login">Log In</a><br>

    <a href="index.php?url=product_category/index">List Product Category</a><br>
    <a href="index.php?url=product_category/create">Create Product Category</a><br>

    <a href="index.php?url=product/index">List Products</a><br>
    <a href="index.php?url=product/create">Create Products</a><br>

    <a href="index.php?url=note/index">List Note</a><br>
    <a href="index.php?url=note/create">Create Note</a><br>
</body>

</html>