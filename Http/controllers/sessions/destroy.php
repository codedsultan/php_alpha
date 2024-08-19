<?php

use Core\Authenticator;

$auth = new Authenticator;
$auth->logout();
// logout();

header('location: /');
exit();