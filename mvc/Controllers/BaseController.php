<?php
class BaseController
{
    const VIEW_FOLDER = 'Views';
    const VIEW_MODEL = 'Models';
    protected function view($path, $datas = [])
    {
        //./Views/user/list_user.php --> user.list_user
        $path = str_replace('.', '/', $path);
        $path .= '.php';
        $path = './' . self::VIEW_FOLDER . '/' . $path;

        foreach ($datas as $key => $data) {
            $$key = $data;
        }
        return require $path;
    }

    protected function loadModel($path)
    {
        return require './' . self::VIEW_MODEL . '/' . $path;
    }
}
?>