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

}
?>