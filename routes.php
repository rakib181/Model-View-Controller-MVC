<?php

use Core\Router;

$router = new Router();

$router->get("/registration", "/registration/index.php")->only('guest');
$router->post("/registration", "/registration/store.php")->only('guest');

$router->get("/create", "/registration/create.php")->only('guest');
$router->post("/login", "/registration/login.php")->only('guest');

$router->get("/logout", "/registration/logout.php");

$router->get("/", "/home.php");

$router->get("/about", "/about.php")->only('auth');;

$router->get("/contact", "/contact.php")->only('auth');

$router->get("/notes", "/notes/index.php")->only('auth');

$router->get("/note/create", "/notes/create.php")->only('auth');

$router->post("/note/create", "/notes/store.php")->only('auth');
$router->get("/note", "/notes/show.php")->only('auth');

$router->get("/note/edit", "/notes/edit.php")->only('auth');
$router->patch("/note/edit", "/notes/update.php")->only('auth');

$router->delete("/note", "/notes/destroy.php")->only('auth');




