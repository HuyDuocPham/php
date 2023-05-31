<h1>User Controller</h1>
<?php
class UserController extends BaseController
{
    private $userModel;
    public function __construct()
    {
        $this->loadModel('UserModel.php');
        $this->userModel = new UserModel;
    }
    public function index()
    {
        $users = $this->userModel->getList();
        return $this->view('user.list_user', ['users' => $users]);
    }
    public function create()
    {
        //validate data
        $errors = [];
        if (isset($_POST['create_user'])) {
            if (strlen(trim($_POST['name'])) === 0) {
                $errors['name'][] = 'Name is required';
            }
            if (strlen(trim($_POST['email'])) === 0) {
                $errors['email'][] = "Email is required";
            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'][] = 'Email is invalid';
            } else {
                $checkUser = $this->userModel->checkUser($_POST['email']);
                if ($checkUser) {
                    $errors['email'][] = "Email exists in system";
                }
            }

            if ($_POST['password'] < 6) {
                $errors['password'][] = 'Password at least 6 characters';
            }

            //errors -> view
            if (count($errors) > 0) {
                return $this->view('user.create_user', ['errors' => $errors]);
            }
            //fresh data
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => sha1($_POST['password'] . 'huyduocphamm!@#$%#')
            ];

            $check = $this->userModel->store($data);
            if ($check) {
                header('Location: ' . URL . '?url=note/index');
            } else {
                throw new \Exception('Create user something went wrong !');
            }
        }

        return $this->view('user.create_user', ['errors' => $errors]);
    }

    public function logIn()
    {
        if (isset($_POST['login'])) {
            $username = $_POST['name'] ?? null;
            $password = $_POST['password'] ?? null;

            $check = $this->userModel->checkLogIn($username, $password) ;
            if($check) {

            }
        }
    }
}
?>