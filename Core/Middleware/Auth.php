<?php

namespace Core\Middleware;

use Core\Session;

class Auth
{

    public function handle(): void
    {
        if(!Session::get('user') ?? false){
            redirect('/create');
        }
    }

}