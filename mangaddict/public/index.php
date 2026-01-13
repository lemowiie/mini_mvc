<?php
session_start();

require_once __DIR__ . '/../app/core/router.php';

$router = new Router();
$router->run();
