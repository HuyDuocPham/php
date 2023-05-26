<?php
class UserModel
{
    public function getListProductHot()
    {
        return [
            ['id' => 1, 'name' => 'Iphone 12'],
            ['id' => 2, 'name' => 'Iphone 13'],
            ['id' => 3, 'name' => 'Iphone 14'],
        ];
    }

    public function getListProductNewArrival()
    {
        return [
            ['id' => 4, 'name' => 'Iphone 2'],
            ['id' => 5, 'name' => 'Iphone 3'],
            ['id' => 6, 'name' => 'Iphone 4'],
        ];
    }
}
?>