<?php

use Core\Authenticator;
use Http\Forms\LoginForm;


$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);


$auth = new Authenticator();

$signIn = $auth->attempts($attributes['email'], $attributes['password']);

if(!$signIn){
    $form->setMessageError('cred', 'email or password is incorrect')->throw();
}

redirect('/');


