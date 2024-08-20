<?php

use Core\Database;
use Core\App;


$db = App::resolve(Database::class);


$heading = "Note";
$currentUserId = 12;

$note = $db->query("SELECT * FROM notes where id = :id", [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id= :id', [
    'id' => $_POST['id']
]);

header('Location: /notes');
exit();