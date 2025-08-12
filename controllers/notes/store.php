<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}

if (!empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors,
    ]);
}

$db->query('INSERT INTO notes (user_id, body) VALUES (:user_id, :body)', [
    'user_id' => 1,
    'body' => $_POST['body'],
]);

header('location: /notes');
exit();
