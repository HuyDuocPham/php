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
        $sql = 'SELECT * FROM note';
        $result = mysqli_query($this->connect, $sql);
        $datas = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }
        return $datas;
    }

    public function find($table = 'note', $id = 1)
    {
        $sql = "SELECT * FROM $table WHERE id = $id";
        $results = mysqli_query($this->connect, $sql);
        $data = mysqli_fetch_assoc($results);
        return $data;
    }
}
?>