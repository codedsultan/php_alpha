<?php
$errors = [];

view('notes/create.view.php',
    [
        'heading' => 'Create Note',
        'errors' => $errors
    ]
);