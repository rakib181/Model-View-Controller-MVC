<?php
use Core\App;
use Core\Database;

$db = App::getContainer()->resolve(Database::class);

$query = "DELETE FROM notes WHERE id = :id";

$db->query($query, [':id' => $_POST['id']]);

$data = $db->query("SELECT * FROM notes")->all();

view("views/notes/index.view.php", ['heading' => "My Notes", 'data' => $data]);