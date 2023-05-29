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
        if (isset($_POST['create_note'])) {
            //validate input
            $errors = [];
            if (strlen(trim($_POST['content'])) === 0) {
                $errors['content'][] = 'Content is required';
            }
            if ($_POST['user_id'] === '0') {
                $errors['user_id'][] = 'User Id is required';
            }

            if (count($errors) > 0) {
                return $this->view('note.create_note', ['errors' => $errors]);
            }

            //Fresh Data
            $data = [
                'content' => $_POST['content'],
                'user_id' => $_POST['user_id']
            ];
            $check = $this->noteModel->store($data);
            if ($check) {
                header('Location: ' . URL . '?url=note/index');
            } else {
                throw new \Exception('Create note something went wrong !');
            }
        }
        return $this->view('note.create_note');
    }

    public function detail($id)
    {
        $note = $this->noteModel->getDetail($id);
        return $this->view('note.detail_note', ['note' => $note]);
    }

    public function delete($id)
    {
        $check = $this->noteModel->destroy($id);
        if ($check) {
            header('Location: ' . URL . '?url=note/index');
        } else
            throw new \Exception('Delete note something went wrong !');

    }

}


?>