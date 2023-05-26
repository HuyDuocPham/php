<!DOCTYPE html>
<html lang="en">
<style>
    html {
        font-family: monospace;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <pre>
        Pham Huy Duoc
    </pre>
    <?php
    $name = 'Pham Huy Duoc';
    printf("Hello: %s", $name);
    // Operators
    echo "<br>";
    $number1 = 10;
    $number2 = 20;
    printf(($number1 === $number2) ? "Hai so bang nhau" : "Hai so khong bang nhau");
    echo "<br>";
    print(++$number1);
    echo "<br>";
    printf(($number1 <> $number2) ?: "Hai so khac nhau");
    echo rand();
    // ??   
    echo "<br>";
    $nguyenvana = null;
    $nguyenvana = 'huyduocphamm'; // echo $nguyenvana ?? "default"; # ==> huyduocphamm
    
    echo $nguyenvana ?? "default"; // #==> default
    // match  same as switch
    echo '<br>';
    $color = 'green';
    $test = match ($color) {
        'green' => 'mau xanh la cay',
        'blue' => 'mau xanh nuoc bien',
        default => 'mau mac dinh'
    };
    echo $test;


    // ARRAY
    echo '<br>';
    $test = [1, 2, 3.4];
    $test1 = array(1, 2, 3, 4);

    //1, Index Arrays: Mang index
    $arrayPoint = [1, 2, 3, 4, 5, 6];
    print_r($arrayPoint[1]);


    //2, Associative Arrays: Mang ket hop
    echo "<br>";
    $arrayNamePoint = [
        'nguyen van a' => 1,
        'nguyen van b' => 2,
        'nguyen van c' => 3,
        'nguyen van d' => 4
    ];
    print_r($arrayNamePoint['nguyen van d']);

    echo '<br>';
    //3, Multidimensional Arrays:  Mang da chieu
    $arrayClass = array(
        'toan' => [1, 2, 3],
        'ly' => [2, 3, 4],
        'hoa' => [1, 8, 9]
    );
    echo '<pre>';
    print_r($arrayClass);
    echo '</pre>';

    echo $arrayClass['hoa'][0];





    echo '<br>';
    $arrayClass2 = array(
        [1, 2, 3],
        [2, 3, 4],
        [7, 8, 9]
    );

    echo '<pre>';
    print_r($arrayClass2);
    echo '</pre>';
    echo $arrayClass2[0][0];


    // FUNCTION Array;
    echo '<br>';
    $array = [5, 2, 7, 8, 1, 7, 0];
    $array2 = [4, 1, 5, 6, 1, 5];
    //1, count(): Dem so luong phan tu;
    echo count($array);
    echo '<br>';
    //2, sort(): Sap xep tang dan;
    sort($array);
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    //3, rsort(): Sap xep giam dan;
    rsort($array);
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    //4, array_push($name, value): Them 1 phan tu vao CUOI mang;
    echo '<br>';
    array_push($array, 99999);
    print_r($array);
    //5, array_unshift($name, value): Them 1 phan tu vao DAU mang; 
    echo '<br>';
    array_unshift($array, 111111);
    print_r($array);
    //6, array_pop($name): Lay phan tu CUOI cua mang;
    echo '<br>';
    echo $itemLast = array_pop($array);
    //7, array_shift($name): Lay phan tu DAU cua mang;
    echo '<br>';
    echo $itemFirst = array_shift($array);
    //8, array_merge($name, $name): Noi hai mang lai;
    echo '<br>';
    print_r($all_array = array_merge($array, $array2));
    //9: array_key($name): Lay tat ca cac key
    print_r(array_keys($array2));
    //10: array_values($value): Lay ra tat ca cac value;
    print_r(array_values($array2));




    //examples: 
    // $array_push($array, 88888);
    $array[] = 88888;


    echo '<br>';
    unset($array[2]);
    print_r($array[2]); // ========> Loi: phan tu [2] khong ton tai!!
    
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    // PHP Loops
    
    echo '<br>';
    //1, for
    for ($i = 0; $i < count($array2); $i++) {
        echo $array2[$i] .'<br>';
    }


    // Tim phan tu le dau tien trong mang;
    echo '<br>';
    $array9 = [2, 4, 6, 5, 7];

    $testOld = 'Khong co so le.';
    for ($i = 0; $i < count($array9); $i++) {
        if ($array9[$i] % 2 !== 0) {
            $testOld = $array9[$i];
            break;
        };       
    }
    echo $testOld;
    
/////    //2, foreach: 

    foreach($array2 as $key => $value) {
        echo "<br>key: $key value: $value";
    }
    
    
    
    ?>
</body>

</html>