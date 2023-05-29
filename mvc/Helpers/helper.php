<?php
function dd($obj)
{
    echo 'pre' . var_dump($obj);
    die;
}

function showErrors($errors, $input)
{
    $string = '';
    if (isset($errors[$input])) {
        foreach ($errors[$input] as $error) {
            $string .= '<br>' . "<small style='color: red'>$error</small>";
        }
    }
    return $string;
}
?>