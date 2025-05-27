<?php
use Core\Response;
use Core\Session;
use JetBrains\PhpStorm\NoReturn;

function dd($value): void
{
    echo "<pre>";
      var_dump($value);
    echo "</pre>";
    die();
}

function getUri($uri): false|array|int|string|null
{
    return parse_url($uri, PHP_URL_PATH);
}

function getQueryString($uri): false|array|int|string|null
{
    return parse_url($uri, PHP_URL_QUERY);
}
function authorized($condition, $status = Response::HTTP_OK): true
{
    if (empty($condition)) {
        abort($status);
    }
    return true;
}
function uriIs($uri): bool
{
    return $_SERVER['REQUEST_URI'] === $uri;
}

function abort($code = 404)
{
    http_response_code($code);
    return require_once base_path('Http/' . 'controllers/' . $code . '.php');
}

function base_path(string $path): string
{
    return BASE_PATH. $path;
}

function view(string $view, $data)
{
    extract($data);
    return require_once  base_path($view);
}

function redirect(string $path): void
{
    header("Location: $path");
    exit();
}


function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}