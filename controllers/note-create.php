<?php

$config = require("config.php");
$db = new Database($config['database']);

$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (strlen($_POST['body']) === 0) {
        $errors['body'] = 'Body cannot be empty';
    }

    if (strlen($_POST['body']) > 1000) {
        $errors['body'] = 'Body cannot be longer than 1000 characters';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes (user_id, body) VALUES (:user_id, :body)', [
            'user_id' => 1,
            'body' => $_POST['body'],
        ]);
    }
}

require "views/note-create.view.php";