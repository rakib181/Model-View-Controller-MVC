<?php
use  Core\App;
use Core\Database;
use Core\Response;


$db = App::getContainer()->resolve(Database::class);

$query = 'SELECT * FROM notes';
$data = $db->query($query)->all();

view("views/notes/index.view.php", ['heading' => "My Notes", 'data' => $data]);