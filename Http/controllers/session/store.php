<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {
    return view('session/create.view.php', [
        'errors' => $form->errors(),
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email,
])->find();

if ($user && password_verify($password, $user['password'])) {
    login([
        'email' => $email,
    ]);

    header('location: /');
    exit();
}

return view('session/create.view.php', [
    'errors' => [
        'email' => 'Please enter a valid email and password',
    ],
]);
