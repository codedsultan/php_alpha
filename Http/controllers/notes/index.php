<?php

use Core\App;
use  Core\Database;

$db = App::resolve(Database::class);


$heading = "My Notes";
$notes = $db->query('SELECT * FROM notes', [])->get();


view('notes/index.view.php',
    [
        'heading' => $heading,
        'notes'=> $notes
    ]
);