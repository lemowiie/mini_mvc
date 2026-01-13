<?php
session_start();

// Chargement automatique basique
require_once __DIR__ . '/../app/core/router.php';

$router = new Router();
$router->run();
