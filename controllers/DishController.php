<?php

require_once __DIR__ . '/../models/DishModel.php';
require_once __DIR__ . '/../models/DishTypeModel.php';

class DishController {
    public static function index(PDO $pdo) {
        $types = DishType::getAll($pdo);
        $firstFive = $fullList = [];

        foreach ($types as $type) {
            $firstFive[$type['id']] = Dish::getFirstFiveByType($pdo, $type['id']);
            $fullList[$type['id']] = Dish::getAllByType($pdo, $type['id']);
        }

        render('index', compact('types', 'firstFive', 'fullList'));
    }

    public static function adminForm(PDO $pdo) {
        $types = DishType::getAll($pdo);
        $dishes = Dish::getAll($pdo);
        render('admin-food', compact('types', 'dishes'));
    }

    public static function create(PDO $pdo) {
        $data = [
            ':name'        => $_POST['name'],
            ':description' => $_POST['description'],
            ':price'       => $_POST['price'],
            ':isActive'    => isset($_POST['isActive']) ? 1 : 0,
            ':type'        => $_POST['dishTypeId']
        ];
        Dish::create($pdo, $data);
        header('Location: /admin/uj-etel');
        exit;
    }

    public static function editForm(PDO $pdo) {
        $dish = Dish::getById($pdo, (int)$_GET['id']);
        if (!$dish) {
            header('Location: /admin/uj-etel');
            exit;
        }
        $types = DishType::getAll($pdo);
        $dishes = Dish::getAll($pdo);
        render('admin-food', compact('types', 'dishes', 'dish'));
    }

    public static function update(PDO $pdo) {
        $data = [
            ':name'        => $_POST['name'],
            ':description' => $_POST['description'],
            ':price'       => $_POST['price'],
            ':isActive'    => isset($_POST['isActive']) ? 1 : 0,
            ':type'        => $_POST['dishTypeId']
        ];
        Dish::update($pdo, (int)$_GET['id'], $data);
        header('Location: /admin/uj-etel');
        exit;
    }

    public static function delete(PDO $pdo) {
        Dish::delete($pdo, (int)$_POST['id']);
        header('Location: /admin/uj-etel');
        exit;
    }
}
