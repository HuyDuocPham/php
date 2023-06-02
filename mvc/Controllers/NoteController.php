<h1>Note Controller</h1>
<?php
class NoteController extends BaseController
{
    private $noteModel;
    private $userModel;
    public function __construct()
    {
        $this->loadModel('NoteModel.php');
        $this->loadModel('UserModel.php');
        $this->noteModel = new NoteModel;
        $this->userModel = new UserModel;
    }
    public function index()
    {
        $notes = $this->noteModel->getList();
        return $this->view('note.list_note', ['notes' => $notes]);
    }
    public function create()
    {
        $errors = [];
        if (isset($_POST['create_note'])) {
            //validate input

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
        //get all records table user;
        $users = $this->userModel->getList();

        return $this->view('note.create_note', ['users' => $users]);
    }

    public function detail($id)
    {
        $errors = [];
        if (isset($_POST['update_note'])) {
            //validate input

            if (strlen(trim($_POST['content'])) === 0) {
                $errors['content'][] = 'Content is required';
            }
            if ($_POST['user_id'] === '0') {
                $errors['user_id'][] = 'User Id is required';
            }

            if (count($errors) > 0) {
                return $this->view('note.detail_note', ['errors' => $errors]);
            }

            //Fresh Data
            $data = [
                'content' => $_POST['content'],
                'user_id' => $_POST['user_id']
            ];
            $id = $_POST['id'];
            $check = $this->noteModel->update($data, $id);
            if ($check) {
                header('Location: ' . URL . '?url=note/index');
            } else {
                throw new \Exception('Create note something went wrong !');
            }
        }
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