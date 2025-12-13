<?php
$host = 'sql100.infinityfree.com';
$db   = 'if0_40664526_database';
$user = 'if0_40664526';
$pass = 'ASdasdasd1123';

try {
  $pdo = new PDO(
    "mysql:host=$host;dbname=$db;charset=utf8mb4",
    $user,
    $pass,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
} catch (PDOException $e) {
  die('Database connection failed');
}
