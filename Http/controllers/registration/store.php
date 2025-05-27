<?php

use Core\App;
use Core\Database;
use Core\Session;
use Http\Forms\RegisterForm;

$db = App::getContainer()->resolve(Database::class);

$form = RegisterForm::validate($attributes = [
    'name' => $_POST['name'] ?? '',
    'email' => $_POST['email'] ?? '',
    'password' => $_POST['password'] ?? '',
]);

try{
    $db->query("INSERT INTO users(name, email, password) VALUES(:name, :email, :password)", [
        "name" => $attributes["name"],
        "email" => $attributes["email"],
        "password" => password_hash($attributes["password"], PASSWORD_BCRYPT),
    ]);
    $form->setMessageSuccess('success', "User created successfully");
}catch (Exception $e){
    $form->setMessageError('message', 'User creation failed or already exists')->throw();
}

view('views/registration/index.view.php', ['errors' => $form->getErrors(), 'success' => $form->getSuccess()]);



