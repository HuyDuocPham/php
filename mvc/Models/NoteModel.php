<?php
class NoteModel extends BaseModel
{
    const TABLE = 'note';
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

}
?>