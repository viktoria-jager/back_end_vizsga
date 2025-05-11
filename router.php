<?php

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/controllers/DishController.php';
require_once __DIR__ . '/controllers/DishTypeController.php';

$method = $_SERVER['REQUEST_METHOD'];
$path   = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

function render($template, $vars = []) {
    extract($vars);
    require __DIR__ . "/templates/{$template}.php";
    exit;
}

if ($method === 'GET' && $path === '/') {
    DishController::index($pdo);
}

if ($method === 'GET' && $path === '/admin/uj-etel') {
    DishController::adminForm($pdo);
}

if ($method === 'POST' && $path === '/admin/etelek' && !isset($_GET['id'])) {
    DishController::create($pdo);
}

if ($method === 'GET' && $path === '/admin/etelek' && isset($_GET['id'])) {
    DishController::editForm($pdo);
}

if ($method === 'POST' && $path === '/admin/etelek' && isset($_GET['id'])) {
    DishController::update($pdo);
}

if ($method === 'POST' && $path === '/admin/etelek/delete') {
    DishController::delete($pdo);
}

if ($method === 'GET' && $path === '/admin/uj-etel-tipus') {
    DishTypeController::adminForm($pdo);
}

if ($method === 'POST' && $path === '/admin/etel-tipusok' && !isset($_GET['id'])) {
    DishTypeController::create($pdo);
}

if ($method === 'GET' && $path === '/admin/etel-tipusok' && isset($_GET['id'])) {
    DishTypeController::editForm($pdo);
}

if ($method === 'POST' && $path === '/admin/etel-tipusok' && isset($_GET['id'])) {
    DishTypeController::update($pdo);
}

if ($method === 'POST' && $path === '/admin/etel-tipusok/delete') {
    DishTypeController::delete($pdo);
}

http_response_code(404);
echo '404 Not Found';
