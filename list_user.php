<?php
define('URL', 'http://localhost/buoi8/');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List_user</title>
</head>

<body>
    <a href="<?= URL . 'register.php' ?>"> Create User</a>

    <?php
    require_once('database.php');
    $sql = "SELECT * FROM users order by id desc limit 0,10";
    $result = mysqli_query($conn, $sql);
    // if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "id:" . $row["id"] . "- UserName" . $row["username"] . " " . "PassWord: " . $row["password"] . "<br>";
//     }
// } else {
//     echo "0 result";
// }
    
    if (isset($_GET['action']) && $_GET['action'] === 'UserDelete' && isset($_GET['id'])) {
        //get image name to delete
        $sqlSelect = 'SELECT image_url from users where id =' . $_GET['id'];
        $resultSelect = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $imageUrl = $row['image_url'];

        $sqlDelete = "DELETE FROM users WHERE id =" . $_GET['id'];
        $resultDelete = mysqli_query($conn, $sqlDelete);
        if ($resultDelete) {
            echo "Delete thanh cong";
            // delete image base on image name
            unlink('uploads/' . $imageUrl);
            header('Location: ' . URL . 'list_user.php');
        } else {
            echo "Delete that bai";
        }
    }

    ?>

    <?php if (mysqli_num_rows($result) > 0) { ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Password</th>
                <th>Image</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td>
                        <?php echo $row["id"]; ?>
                    </td>
                    <td>
                        <?php echo $row["username"]; ?>
                    </td>
                    <td>
                        <?php echo $row["password"]; ?>
                    </td>
                    <td><img src="<?php echo URL . "uploads/" . $row["image_url"]; ?>" alt="<?php $row["username"]; ?>"
                            width="50px" height="50px">
                    </td>
                    <td>
                        <?php echo $row["created_at"]; ?>
                    </td>
                    <td>
                        <a href="?action=UserDelete&id=<?= $row['id'] ?>">Delete</a>
                        <a href="<?php echo URL . 'detail.php?id=' . $row['id'] ?>">Detail</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } else {
        echo "No results";
    } ?>

    <?php
    mysqli_data_seek($result, 0); // reset con trỏ về 0
    ?>
</body>