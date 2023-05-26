<h1>Note Controller</h1>
<?php
class NoteController extends BaseController
{
    private $noteModel;
    public function __construct()
    {
        $this->loadModel('NoteModel.php');
        $this->noteModel = new NoteModel;
    }
    public function index()
    {
        $notes = $this->noteModel->getList();
        return $this->view('note.list_note', ['notes' => $notes]);
    }
    public function create()
    {
        return $this->view('note.create_note');
    }

    public function detail($id)
    {
        $note = $this->noteModel->getDetail($id);
        return $this->view('note.detail_note' , ['note' => $note]);
    }
}


?>