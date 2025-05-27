<?php

use Core\Session;

view("views/registration/index.view.php", ["heading" => "Register Here",
    "errors" => Session::get('errors', []), "success" => Session::get('success', [])]);