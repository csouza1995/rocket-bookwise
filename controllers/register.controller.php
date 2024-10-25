<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database->query(
        'INSERT INTO users (name, surname, email, password) values (:name, :surname, :email, :password)',
        [
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ]
    );

    $message = 'User registered successfully';
}

view(
    'login',
    [
        'message' => $message ?? null,
    ],
    'auth'
);
