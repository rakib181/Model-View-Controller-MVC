<?php

use Core\App;
use Core\Database;

$db = App::getContainer()->resolve(Database::class);

$id = empty($_GET['id']) ? 0 : $_GET['id'];

$query = 'SELECT * FROM notes WHERE id = :id';

$data = $db->query($query, [':id' => $id])->findOrFail();
view("views/notes/edit.view.php",   ['heading' => "Edit Note", 'data' => $data]);