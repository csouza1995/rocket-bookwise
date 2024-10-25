<?php

$message = $_REQUEST['message'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 
}

view('login', layout: 'auth');
