<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .black {
        width: 50px;
        height: 50px;
        background-color: black;
    }

    .white {
        width: 50px;
        height: 50px;
        background-color: white;
    }
</style>

<body>
    <h1 style="color: red">Buoi 3</h1>

    <?php
    // 1, Viet vong for in tu 1 -> 10
    for ($i = 1; $i <= 10; $i++) {
        echo $i . "<br>";
    }

    //2, viet chuong trinh PHP tinh tong cac so tu 1--100
    $sum = 0;
    for ($i = 1; $i <= 100; $i++) {
        $sum += $i;
    }
    echo "Tong cac so tu 1 --> 100 la : " . $sum . "<br>";

    //3, Viet chuong trinh PHP in ra bang cuu chuong tu 1--10;
    echo "<table>";
    for ($i = 1; $i <= 10; $i++) {
        echo "Bang cuu chuong : " . "" . $i;
        echo "<tr>";
        for ($j = 1; $j <= 10; $j++) {
            echo "<pre>";
            echo $i . " x " . $j . " = " . $j * $i;
            echo "</pre>";
        }
        echo "</tr>";
    }
    echo "</table>";

    //4, Viet chuong trinh PHP tim cac so chan tu 1--> 20
    $sumEven = 0;
    for ($i = 0; $i <= 20; $i += 2) {
        $sumEven += $i;
    }
    echo "Tong cac so chan tu 1-->20 la: " . $sumEven . "<br>";

    //5, Viet chuong trinh PHP de in ra cac so nguyen to tu 1--> 100
    ?>
    <!-- Begin: Bang cuu chuong: -->
    <table border='1'>
        <?php
        for ($i = 0; $i <= 10; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 10; $j++) {
                echo "<td>";
                if ($i == 00) {
                    echo "Bang cuu chuong: " . "" . $j;
                } else {
                    echo $i . " x " . $j . " = " . $j * $i;
                }
                echo "</td>";
            }
            echo "</tr>";

        }
        ?>
    </table>
    <!-- End: -->

    <table border="1">
        <?php
        for ($i = 1; $i <= 8; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 8; $j++) {
                $class = ($i + $j) % 2 === 0 ? "white" : "black";
                echo '<td class="' . $class . '">' . '</td>';
            }
            echo "</tr>";
        }
        ?>
    </table>


    <?php
    echo "<h1>" . "Array" . "</h1>" . "<br>";

    //1:Tao mot mang co 10 chuoi, va in ra chuoi lon nhat: 
    $array = [
        "aaa",
        "a",
        "sdf",
        "dsfdsf",
        "sdfdsf",
        "bdffdfdsfds",
        "dfdsfsdfdb",
        "sdfsdfds",
        "sdf",
        "a",
    ];

    $max_length=0;
    $max_string="";
    foreach($array as $string){
        $length = strlen($string);
        if($length> $max_length) {
            $max_length = $length;
            $max_string = $length;
        }
    }
    echo "Chuoi dai nhat la: ". $max_string. "<br>"."Do dai la : " .$max_length."<br>";

    //2: Tao mot mang so nguyen va tim ra so lon nhat trong mang;
    $arrayNumber = [4,5,6,1,7];
    $max = max($arrayNumber);
    echo "Gia tri lon nhat trong mang la : " . $max . "<br>";

    //3: Cho mot mang co 10 so nguyen va tim ra gia tri lon thu hai trong mang:
    $arrayNumber2 = [1,2,3,4,5,6,7,8,9,10, 10, 10, 10];
    //Dung: rsort(): 
    rsort($arrayNumber2);
    echo "rsort(): "."Phan tu lon thu hai la: " .$arrayNumber2[1] . "<br>";

    // Neu dung sort():
    $arrayNumberSort = [1,2,3,4,5,6,7,8,9,9,9,9,10, 10, 10, 10];
    sort($arrayNumberSort);
    echo "sort(): "."Phan tu lon thu hai la: " .$arrayNumberSort[count($arrayNumberSort)-2] . "<br>";
    // Hoac: 
        $max1 = max($arrayNumber2);
        $index = array_search($max1, $arrayNumber2);
        unset($arrayNumber2[$index]);
        $max3 = max($arrayNumber2);
        echo "unset(): "."So lon  thu hai la : " . $max3 . "<br>"; 
                        // dung array_unique(): 
                        $arrayUnique = array_unique($arrayNumber2);
                        rsort($arrayNumber2);
                        echo "array_unique(): "."Phan tu lon thu hai la: " .$arrayNumber2[1] . "<br>";
    //4: cho mot mang so nguyen hay viet PHP de tim phan tu nho nhat va phan tu lon nhat: 
    $array = array(9,2,7,2,5,1);
    $min = min($array);
    $max= max($array);
    $minIndex = array_search($min, $array);
    $maxIndex = array_search($max, $array);

    //5: Cong tat ca  cac gia tri cua mang len 5: array_map():
    $arrayAdd = array(9,2,7,2,5,1);
    $arrayAddNew = array_map (function($item){
        return $item +5;
    }, $arrayAdd);
    echo '<pre>';
    print_r($arrayAddNew);
    echo '</pre>';
    //6: Loc tat ca cac phan tu la so chan: array_filer(): 

    echo "<br>";
    $arrayEven = array(9,2,7,2,5,1);
    $arrayEvenNew = array_filter($arrayEven ,function($num){
        return $num %2 == 0 ;
    });
    echo '<pre>';
    print_r($arrayEvenNew);
    echo '</pre>';
//var_dump($name), explode('char', $name) ==> convert to array, implode() ==> convert to string , 
$name = "Nguyen Van A";

    var_dump($name); #--> string(12);

    $arrayName = explode(" ", $name); #==> convert string to array:  
    echo '<pre>';
    print_r($arrayName);
    echo '</pre>';

$test = ["Nguyen", "Van", "A"];
    $stringTest = implode("-",$test);
    echo '<pre>';
    print_r($stringTest); #==> convert array to string
    echo '</pre>';
// convert product ==> urlFriendly
$product = "     Quan Ao Tre Em     ";
$urlFriendly ="Quan-Ao-Tre-Em";
    //$arrayProduct = explode(" ", $product); 
    $arrayProduct = explode(" ", trim($product)); 
    $arrayUrl = implode("-", $arrayProduct);
    echo '<pre>';
    print_r($arrayUrl);
    echo '</pre>';
    #==> -----Quan-Ao-Tre-Em-----    <=== trim($product)
    


    ?>
</body>

</html>