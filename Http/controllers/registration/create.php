<?php

use Core\Session;

return view("/views/registration/login.view.php", ['heading' => "Login", 'errors' => Session::get('errors', []), 'success' => Session::get('success', [])]);

