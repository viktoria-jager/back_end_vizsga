<?php

class DishType {
    public static function getAll(PDO $pdo) {
        return $pdo->query('SELECT * FROM dishTypes ORDER BY name')->fetchAll();
    }

    public static function getById(PDO $pdo, $id) {
        $stmt = $pdo->prepare('SELECT * FROM dishTypes WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function create(PDO $pdo, $data) {
        $stmt = $pdo->prepare("
            INSERT INTO dishTypes (name, description)
            VALUES (:name, :description)
        ");
        $stmt->execute($data);
    }

    public static function update(PDO $pdo, $id, $data) {
        $data[':id'] = $id;
        $stmt = $pdo->prepare("
            UPDATE dishTypes
            SET name = :name,
                description = :description
            WHERE id = :id
        ");
        $stmt->execute($data);
    }

    public static function delete(PDO $pdo, $id) {
        $stmt = $pdo->prepare('DELETE FROM dishTypes WHERE id = ?');
        $stmt->execute([$id]);
    }
}
