<?php

use Core\NoteValidationException;
use Core\RegisterValidationException;
use Core\Session;
use Core\ValidationException;

Session::start();
const BASE_PATH = __DIR__. '/../';

//Using Composer
require BASE_PATH . 'vendor/autoload.php';

require_once BASE_PATH."Core/functions.php";

//Manually Autoload
//spl_autoload_register(function($class){
//    $path = str_replace("\\", DIRECTORY_SEPARATOR, $class);
//    require_once base_path("$path.php");
//});

require_once base_path("bootstrap.php");
require_once base_path("routes.php");

$uri = $_SERVER['REQUEST_URI'];

$method = strtoupper($_POST['_method'] ?? $_SERVER['REQUEST_METHOD']);

$uri = getUri($uri);
try{
    $router->route($uri, $method);
}catch (ValidationException $exception){
    Session::flash('old', ['email' => $exception->old['email']]);
    Session::flash('errors', $exception->errors);
    Session::flash('success', $exception->success);
    redirect($router->previousUrl());
}catch (NoteValidationException $exception){
    Session::flash('old', ['body' => $exception->old['body']]);
    Session::flash('errors', $exception->errors);
    Session::flash('success', $exception->success);
    redirect($router->previousUrl());
}catch (RegisterValidationException  $exception){
    Session::flash('old', ['name' => $exception->old['name'], 'email' => $exception->old['email']]);
    Session::flash('errors', $exception->errors);
    Session::flash('success', $exception->success);
    redirect($router->previousUrl());
}


Session::unflash();




