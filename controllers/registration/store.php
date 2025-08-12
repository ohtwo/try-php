<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address';
}

if (!Validator::string($password, 8, 255)) {
    $errors['password'] = 'Please enter a password between 8 and 255 characters';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email,
])->find();


if ($user) {
    $errors['email'] = 'This email address is already in use';

    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
} else {
    $db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);

    $_SESSION['user'] = [
        'email' => $email,
    ];

    header('location: /');
    exit();
}
