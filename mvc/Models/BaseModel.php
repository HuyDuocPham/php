<?php
class BaseModel
{
    private $connect;
    public function __construct()
    {
        require_once './Core/Database.php';
        $db = new Database;
        $this->connect = $db->connect();
    }

    public function all($table = 'note')
    {
        $sql = "SELECT * FROM $table";
        $result = mysqli_query($this->connect, $sql);
        $datas = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }
        return $datas;
    }

    public function find($table = 'user', $id = 1)
    {
        $sql = "SELECT * FROM $table WHERE id = $id";
        $results = mysqli_query($this->connect, $sql);
        $data = mysqli_fetch_assoc($results);
        return $data;
    }

    public function create($arrayData, $table = 'user'): string
    {
        $columns = implode(',', array_keys($arrayData));
        $arrayValues = array_map(function ($item) {
            return "'" . $item . "'";
        }, array_values($arrayData));

        $values = implode(',', $arrayValues);
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $check = mysqli_query($this->connect, $sql);
        return $check;
    }
    public function delete($id, $table = 'user')
    {
        $sql = "DELETE FROM $table WHERE id = $id";
        return mysqli_query($this->connect, $sql);
    }

    public function updateNew($arrayData, $table = 'user', $id)
    {
        $list = [];
        foreach ($arrayData as $key => $value) {
            $list[] = "$key ='" . $value . "'";
        }
        $listData = implode(',', $list);
        $sql = "UPDATE $table set $listData WHERE id = $id";
        return mysqli_query($this->connect, $sql);
    }

    public function checkUserExits($table, $email)
    {
        $sql = "SELECT * FROM $table WHERE email = '$email'";
        $query = mysqli_query($this->connect, $sql);
        $rows = mysqli_num_rows($query);
        return $rows;
    }

    public function checkLogIn($username, $password) {

    }
 


}
?>