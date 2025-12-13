<?php
require __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: book.php');
  exit;
}

$category = trim($_POST['category'] ?? '');
$item = trim($_POST['item'] ?? '');
$name = trim($_POST['customer_name'] ?? '');
$email = trim($_POST['customer_email'] ?? '');
$date = $_POST['date'] ?? '';

if (!$category || !$item || !$name || !$email || !$date) {
  header('Location: book.php?error=1');
  exit;
}
$stmt = $pdo->prepare("
  INSERT INTO bookings (category, item, customer_name, customer_email, booking_date)
  VALUES (?, ?, ?, ?, ?)
");
$stmt->execute([$category, $item, $name, $email, $date]);

/* Send confirmation email */
$subject = "Booking Confirmed";
$message = "
Hello $name,

Your booking has been confirmed!

Category: " . ucfirst($category) . "
Item: $item
Date: $date

Thank you for booking with us.
";
$headers = "From: bookings@testing.com\r\nReply-To: bookings@testing.com";

@mail($email, $subject, $message, $headers);

/* Redirect with success */
header('Location: book.php?success=1');
exit;
