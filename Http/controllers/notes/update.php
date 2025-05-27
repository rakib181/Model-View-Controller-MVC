<?php

use Core\App;
use Core\Database;
use Core\Response;
use Http\Forms\NoteForm;


$db = App::getContainer()->resolve(Database::class);

$currentUserId = $_SESSION["user"]["id"];
authorized($_POST['user_id'] == $currentUserId, Response::HTTP_FORBIDDEN);


$form = NoteForm::validate($attributes = ['body' => $_POST['body']]);

$data = $db->query('SELECT * FROM notes WHERE id = :id',
    ['id' => $_POST['id'] ?? 0])->find();

$db->query('UPDATE notes SET body = :body WHERE id = :id',
    ['body' => $_POST['body'], 'id' => $_POST['id']]
);

$data = $db->query('SELECT * FROM notes WHERE id = :id',
    ['id' => $_POST['id'] ?? 0])->find();
$form->setMessageSuccess('success', 'Note updated successfully');



view("views/notes/edit.view.php",   ['heading' => "Edit Note", 'data' => $data, 'errors' => $form->getErrors(), 'success' => $form->getSuccess()]);
