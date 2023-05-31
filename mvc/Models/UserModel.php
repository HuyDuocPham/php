<?php
class UserModel extends BaseModel
{
    const TABLE = 'user';
    public function getList()
    {
        $datas = $this->all(self::TABLE);
        return $datas;
    }

    public function getDetail($id)
    {
        return $this->find(self::TABLE, $id);
    }

    public function store($data)
    {
        return $this->create($data, self::TABLE);
    }

    public function destroy($id)
    {
        return $this->delete($id, self::TABLE);
    }
    public function update($data, $id)
    {
        return $this->updateNew($data, self::TABLE, $id);
    }
    public function checkUser($email)
    {
        $data = $this->checkUserExits(self::TABLE, $email);
        return $data;
    }

}
?>