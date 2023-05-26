<?php
class App
{
    private $controller = 'product';
    private $action = 'index';
    private $params;
    public function __construct()
    {
        if (isset($_GET['url'])) {
            $url = explode('/', $_GET['url']);
            if (str_contains($url[0], '_')) {
                $valuesList = array_map(function ($v) {
                    return ucfirst($v);
                }, explode('_', $url[0]));
                $controller = implode('', $valuesList);
            } else {
                $controller = ucfirst($url[0]);
            }
            $this->controller = $controller . 'Controller';
            // $this->$controller = new $this->controller(); ??
            require_once './Controllers/' . $this->controller . '.php';

            if (isset($url[1])) {
                $this->action = $url[1];
            }

            if (isset($url[2])) {
                $this->params = $url[2];
            }



            $controllerObj = new $this->controller();
            $action = $this->action;
            $controllerObj->$action($this->params);
            // $controllerObj->$action();
            // call_user_func_array(array($this->controller, $this->action), []);
        }
    }
}
?>