<h1>
    <?= $headingHot ?>
</h1>

<?php
// echo '<pre>';
// print_r($datas);
?>
<table border="1">
    <tr>
        <th>STT</th>
        <th> Product Name</th>
    </tr>
    <?php
    foreach ($listProductHot as $key => $data):
        ?>
        <tr>
            <td>
                <?= $key + 1 ?>
            </td>
            <td>
                <?= $data['name'] ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>


<h1>
    <?=
        $headingNewArrival;
    ?>
</h1>

<table border="1">
    <tr>
        <th>STT</th>
        <th> Product Name</th>
    </tr>
    <?php
    foreach ($listProductNewArrival as $key => $data):
        ?>
        <tr>
            <td>
                <?= $key + 1 ?>
            </td>
            <td>
                <?= $data['name'] ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>