<h1>User Controller</h1>
<?php
class UserController extends BaseController
{
    public function index()
    {
        return $this->view('user.list_user');
    }
    public function create()
    {
        return $this->view('user.create_user');

    }
}
?>