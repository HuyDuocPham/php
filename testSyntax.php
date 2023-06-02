<?php

$capitals = [
    'Japan' => 'Tokyo',
    'France' => 'Paris',
    'Germany' => 'Berlin',
    'United Kingdom' => 'London',
    'United States' => 'Washington D.C.'
];
echo '<pre>';
print_r($capitals);


foreach ($capitals as $country => $capital) {
    echo "The capital city of {$country} is $capital" . '<br>';
}
?>