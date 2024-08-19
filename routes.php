<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php');

$router->get('/login', 'sessions/create.php')->only('guest');
$router->post('/session', 'sessions/store.php')->only('guest');
$router->delete('/session', 'sessions/destroy.php')->only('auth');