<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}


function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}


function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }

    return true;
}

function abort($status = 404)
{
    http_response_code($status);

    require base_path("views/{$status}.php");

    die();
}

function redirect($path)
{
    header('Location: ' . $path);
    exit();
}



function old($key ,$default = '')
{
     return  \Core\Session::get('old')[$key] ?? $default ;
}
