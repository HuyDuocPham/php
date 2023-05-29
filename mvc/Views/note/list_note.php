<h1>List Note</h1>
<?php
// echo '<pre>';
// print_r($notes)
?>

<table border="1">
    <tr>
        <th>Stt</th>
        <th>Id</th>
        <th>Content</th>
        <th>User Id</th>
        <th>Create At</th>
        <th>Action</th>
    </tr>
    <?php foreach ($notes as $key => $note): ?>
        <tr>
            <td>
                <?= $key + 1 ?>
            </td>
            <td>
                <?= $note['id'] ?>
            </td>
            <td>
                <?= $note['content'] ?>
            </td>
            <td>
                <?= $note['user_id'] ?>
            </td>
            <td>
                <?= $note['created_at'] ?>
            </td>
            <td>
                <a href="<?= URL . '?url=note/detail/' . $note['id'] ?>">Detail</a>
                <a onclick="return confirm('Are you sure?')"
                    href="<?= URL . '?url=note/delete/' . $note['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>