<?php

class Dish {
    public static function getFirstFiveByType(PDO $pdo, $typeId) {
        $stmt = $pdo->prepare(
            'SELECT * FROM dishes WHERE isActive=1 AND dishTypeId=? ORDER BY name LIMIT 5'
        );
        $stmt->execute([$typeId]);
        return $stmt->fetchAll();
    }

    public static function getAllByType(PDO $pdo, $typeId) {
        $stmt = $pdo->prepare(
            'SELECT * FROM dishes WHERE isActive=1 AND dishTypeId=? ORDER BY name'
        );
        $stmt->execute([$typeId]);
        return $stmt->fetchAll();
    }

    public static function getAll(PDO $pdo) {
        return $pdo->query('
            SELECT d.*, dt.name AS typeName
            FROM dishes d
            JOIN dishTypes dt ON d.dishTypeId = dt.id
            ORDER BY d.name
        ')->fetchAll();
    }

    public static function getById(PDO $pdo, $id) {
        $stmt = $pdo->prepare('SELECT * FROM dishes WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function create(PDO $pdo, $data) {
        $stmt = $pdo->prepare("
            INSERT INTO dishes (name, description, price, isActive, dishTypeId)
            VALUES (:name, :description, :price, :isActive, :type)
        ");
        $stmt->execute($data);
    }

    public static function update(PDO $pdo, $id, $data) {
        $data[':id'] = $id;
        $stmt = $pdo->prepare("
            UPDATE dishes
            SET name = :name,
                description = :description,
                price = :price,
                isActive = :isActive,
                dishTypeId = :type
            WHERE id = :id
        ");
        $stmt->execute($data);
    }

    public static function delete(PDO $pdo, $id) {
        $stmt = $pdo->prepare('DELETE FROM dishes WHERE id = ?');
        $stmt->execute([$id]);
    }
}
