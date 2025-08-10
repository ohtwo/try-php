<?php

$config = require("config.php");
$db = new Database($config['database']);

$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query('INSERT INTO notes (user_id, body) VALUES (:user_id, :body)', [
        'user_id' => 1,
        'body' => $_POST['body'],
    ]);
}

require "views/note-create.view.php";