<?php

use Core\Database;
use Core\Validator;

$config = require base_path("config.php");
$db = new Database($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes (user_id, body) VALUES (:user_id, :body)', [
            'user_id' => 1,
            'body' => $_POST['body'],
        ]);
    }
}

view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => $errors,
]);
