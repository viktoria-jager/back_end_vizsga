<?php

require_once __DIR__ . '/../models/DishTypeModel.php';

class DishTypeController {
    public static function adminForm(PDO $pdo) {
        $types = DishType::getAll($pdo);
        render('admin-food-type', compact('types'));
    }

    public static function create(PDO $pdo) {
        $data = [
            ':name'        => $_POST['name'],
            ':description' => $_POST['description']
        ];
        DishType::create($pdo, $data);
        header('Location: /admin/uj-etel-tipus');
        exit;
    }

    public static function editForm(PDO $pdo) {
        $type = DishType::getById($pdo, (int)$_GET['id']);
        if (!$type) {
            header('Location: /admin/uj-etel-tipus');
            exit;
        }
        $types = DishType::getAll($pdo);
        render('admin-food-type', compact('types', 'type'));
    }

    public static function update(PDO $pdo) {
        $data = [
            ':name'        => $_POST['name'],
            ':description' => $_POST['description']
        ];
        DishType::update($pdo, (int)$_GET['id'], $data);
        header('Location: /admin/uj-etel-tipus');
        exit;
    }

    public static function delete(PDO $pdo) {
        DishType::delete($pdo, (int)$_POST['id']);
        header('Location: /admin/uj-etel-tipus');
        exit;
    }
}
