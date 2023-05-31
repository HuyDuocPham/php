<h2>List User</h2>

<table border="1">
    <tr>
        <th>Stt</th>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Created_at</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $key => $user): ?>
        <tr>
            <td>
                <?= $key + 1 ?>
            </td>
            <td>
                <?= $user['id'] ?>
            </td>
            <td>
                <?= $user['name'] ?>
            </td>
            <td>
                <?= $user['email'] ?>
            </td>
            <td>
                <?= $user['password'] ?>
            </td>
            <td>
                <?= $user['created_at'] ?>
            </td>
            <td>
                <a href="<?= URL . '?url=user/detail/' . $user['id'] ?>">Detail</a>
                <a onclick="return confirm('Are you sure?')"
                    href="<?= URL . '?url=user/delete/' . $user['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>