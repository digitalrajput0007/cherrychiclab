<?php
declare(strict_types=1);

$route = $argv[1] ?? '/';
$_SERVER['REQUEST_URI'] = $route;
$_SERVER['REQUEST_METHOD'] = 'GET';

require __DIR__ . '/../public/index.php';

