<?php
class Database
{
    const HOST = "localhost";
    const USERNANE = "root";
    const PASSWORD = "";
    const DB_NAME = "mvc";
    const PORT = 3307;

    private $connect;


    public function connect()
    {
        try {

            $this->connect = mysqli_connect(self::HOST, self::USERNANE, self::PASSWORD, self::DB_NAME, self::PORT);
            mysqli_set_charset($this->connect, 'utf8');

            if (mysqli_connect_errno() === 0) {
                return $this->connect;
            }
            throw new Exception('Unable to connect');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

}

?>