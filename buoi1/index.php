<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    //variables
    $name = 'Pham Huy Duoc';
    $age = 31;
    $center = 'Green Academy';
    $address = 'HCM';
    $point = 2;
    // cach 1: 
    echo 'Hello ' . $name . '!';
    echo '<br>';
    // cach 2: 
    echo "Hello $name";
    echo "Hello $name, Location: $address";
    // cach 3
    echo '<br>';
    echo sprintf('Study: %s', $center);
    echo '<br>';
    echo sprintf('Study: %s, Location: %s', $center, $address);
    echo "Point: $point";
    echo "Duoc";
    // if else statement
    echo '<br>';
    if ($point <= 30) {
        # code...
        echo 'boy';
    } else {
        # code...
        echo 'man';
    }



    if ($point < 6.5) {
        echo 'Trung Binh';
    } else if ($point >= 8) {
        echo 'Gioi';
    } else {
        echo 'Kha';
    }
    // cach khac
    $type = 'Kha';
    $color = 'green';
    if ($point < 6.5) {
        $type = 'Trung Binh';
        $color = 'red';
    } else if ($point >= 8) {
        $type = 'Gioi';
        $color = 'blue';
    }

    // if ($type == 'gioi') {
    //     echo '<p style="color: green">' . $type . '</p>';
    // } else if ($type == 'Kha') {
    //     echo '<p style="color: red">' . $type . '</p>';
    // } else {
    //     echo '<p style="color: blue">' . $type . '</p>';
    // }
    //     echo '<p style="color: blue">' . $type . '</p>';
    
    // cach khac: 
    echo "<p style='color: $color'>" . $type . '</p>';
    ?>
    <!-- Html -->
    <!-- Cach khac -->
    <p style='color: $color'>$type</p>
    <p style='color:<?php echo $color; ?>'>$type</p>
    <p style='color: <?php echo $color; ?>'> <?= $type ?></p>

    <!-- php -->
    <?php if ($age <= 30) { ?>
        <!-- htmt -->
        <p style="color: red">Boy</p> 
        <!-- php -->
    <?php }else { ?>
        <!-- html -->
        <p style="color: green">Men</p>
    <!-- php -->
    <?php } ?>
<!-- Array -->
    <?php 
    $arrayPoint = [7, 8 ,9];
    //cach2
    $arrayPoint2 = array(1,2,3);
    print_r($arrayPoint); // in het mang
    echo '<br>';
    echo $arrayPoint[1]; // in mang tai 1
    echo '<br>';
    $arrayNamePoint =['name1'=>8,'name2' => 9, 'name3' => 10];
    print_r($arrayNamePoint);
    echo '<br>' .$arrayNamePoint['name1'];
    ?>
</body>

</html>