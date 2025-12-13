<?php
require __DIR__ . '/admin-auth.php';
require __DIR__ . '/../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: index.php');
  exit;
}

$id = (int)($_POST['id'] ?? 0);

if ($id > 0) {
  $stmt = $pdo->prepare("DELETE FROM bookings WHERE id = ?");
  $stmt->execute([$id]);
}

header('Location: index.php?deleted=1');
exit;
?>