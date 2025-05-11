<?php

require_once __DIR__ . '/router.php';
require_once __DIR__ . '/db.php';



if ($_SERVER['REQUEST_URI'] === '/') {
    require './templates/index.php';
}

if ($_SERVER['REQUEST_URI'] === '/admin/uj-etel') {
    require './templates/admin-food.php';
}

if ($_SERVER['REQUEST_URI'] === '/admin/uj-etel-tipus') {
    require './templates/admin-food-type.php';
}

