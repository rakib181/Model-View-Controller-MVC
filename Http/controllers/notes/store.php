<?php

use Core\App;
use Core\Database;
use Http\Forms\NoteForm;


$db = App::getContainer()->resolve(Database::class);

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $form = NoteForm::validate($attributes = ['body' => $_POST['body']]);
    try{
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)',
            ['body' => $_POST['body'], 'user_id' => $_SESSION['user']['id']]
        );
        $form->setMessageSuccess('success', 'Note created successfully');
    }catch(PDOException $e){
        $form->setMessageError('cred', 'Error creating note')->throw();
    }
}

view("views/notes/create.view.php",   ['heading' => "Create a New Note",  'errors' => $form->getErrors(), 'success' => $form->getSuccess()]);
