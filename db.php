<?php

$host    = '127.0.0.1';             
$db      = 'etterem';
$user    = 'root';
$pass    = '';
$charset = 'utf8mb4';
$port    = 3306;


$dsn = "mysql:host=$host;port=$port;dbname=$db";
try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    echo "✅ Connected to MySQL successfully.";
} catch (PDOException $e) {
    
    die("❌ Connection failed: " . $e->getMessage());
}