<?php
use Core\App;
use Core\Database;
use Core\Response;


$db = App::getContainer()->resolve(Database::class);

$id = empty($_GET['id']) ? 0 : $_GET['id'];

$query = 'SELECT * FROM notes WHERE id = :id';

$data = $db->query($query, [':id' => $id])->findOrFail();

$currentUserId = $_SESSION["user"]["id"];

authorized($data['user_id'] == $currentUserId, Response::HTTP_FORBIDDEN);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $query = 'DELETE FROM notes WHERE id = :id';
    $params = [':id' => $_POST['id']];
    $result = $db->query($query, $params);
    $query = "SELECT * FROM notes";
    $data = $db->query($query)->all();
    view("views/notes/index.view.php", ['heading' => 'My Notes', 'data' => $data]);
}else{
    view("views/notes/show.view.php", ['heading' => 'Notes', 'data' => $data]);
}



