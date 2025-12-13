<?php
require __DIR__ . '/admin-auth.php';
require __DIR__ . '/../db.php';

$bookings = $pdo->query("
  SELECT * FROM bookings
  ORDER BY created_at DESC
")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin | Bookings</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style><?php include __DIR__ . '/../shared-styles.css.php'; ?></style>

<style>
.admin-wrapper {
  max-width: 1100px;
  margin: 28px auto 60px;
  padding: 0 16px;
}

.admin-card {
  background: var(--card);
  border: 1px solid var(--line);
  border-radius: 14px;
  box-shadow: var(--shadow);
  padding: 18px;
}

.admin-title {
  font-size: 22px;
  font-weight: 900;
  margin-bottom: 12px;
}

.admin-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 14px;
}

.admin-table th,
.admin-table td {
  padding: 12px 10px;
  border-bottom: 1px solid var(--line);
}

.admin-table th {
  font-size: 12px;
  color: var(--muted);
  text-transform: uppercase;
  font-weight: 800;
}

.badge {
  padding: 4px 8px;
  border-radius: 999px;
  font-weight: 800;
  font-size: 12px;
}
.badge.movie { background: rgba(59,130,246,.15); color:#3b82f6; }
.badge.event { background: rgba(34,197,94,.15); color:#22c55e; }
.badge.sport { background: rgba(245,158,11,.15); color:#f59e0b; }

.delete-btn {
  background: rgba(239,68,68,0.15);
  color: #ef4444;
  border: 1px solid rgba(239,68,68,0.4);
  padding: 6px 10px;
  border-radius: 8px;
  font-weight: 800;
  cursor: pointer;
}
.delete-btn:hover {
  background: rgba(239,68,68,0.25);
}

/* MOBILE CARDS */
.mobile-card {
  display: none;
  margin-bottom: 12px;
  border: 1px solid var(--line);
  border-radius: 14px;
  padding: 14px;
  background: var(--card);
}

.mobile-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 6px;
  font-size: 14px;
}
.mobile-row span {
  color: var(--muted);
}

@media (max-width: 800px) {
  .admin-table {
    display: none;
  }
  .mobile-card {
    display: block;
  }
}
</style>
</head>

<body>

<?php include __DIR__ . '/admin-header.php'; ?>

<div class="admin-wrapper">

  <?php if (isset($_GET['deleted'])): ?>
    <div style="
      margin-bottom:14px;
      padding:12px;
      border-radius:12px;
      background:rgba(34,197,94,0.12);
      border:1px solid rgba(34,197,94,0.35);
      color:#22c55e;
      font-weight:800;
      text-align:center;
    ">
      Booking removed successfully
    </div>
  <?php endif; ?>

  <div class="admin-card">
    <div class="admin-title">All Bookings</div>

    <table class="admin-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Category</th>
          <th>Item</th>
          <th>Name</th>
          <th>Email</th>
          <th>Date</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($bookings as $b): ?>
          <tr>
            <td>#<?= $b['id'] ?></td>
            <td><span class="badge <?= $b['category'] ?>"><?= ucfirst($b['category']) ?></span></td>
            <td><?= htmlspecialchars($b['item']) ?></td>
            <td><?= htmlspecialchars($b['customer_name']) ?></td>
            <td><?= htmlspecialchars($b['customer_email']) ?></td>
            <td><?= $b['booking_date'] ?></td>
            <td>
              <form method="POST" action="delete-booking.php" onsubmit="return confirm('Remove this booking?')">
                <input type="hidden" name="id" value="<?= $b['id'] ?>">
                <button class="delete-btn">Remove</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <?php foreach ($bookings as $b): ?>
      <div class="mobile-card">
        <div class="mobile-row"><strong>#<?= $b['id'] ?></strong></div>
        <div class="mobile-row"><span>Category</span><span class="badge <?= $b['category'] ?>"><?= ucfirst($b['category']) ?></span></div>
        <div class="mobile-row"><span>Item</span><strong><?= htmlspecialchars($b['item']) ?></strong></div>
        <div class="mobile-row"><span>Name</span><?= htmlspecialchars($b['customer_name']) ?></div>
        <div class="mobile-row"><span>Email</span><?= htmlspecialchars($b['customer_email']) ?></div>
        <div class="mobile-row"><span>Date</span><?= $b['booking_date'] ?></div>

        <form method="POST" action="delete-booking.php" onsubmit="return confirm('Remove this booking?')" style="margin-top:8px;">
          <input type="hidden" name="id" value="<?= $b['id'] ?>">
          <button class="delete-btn" style="width:100%;">Remove Booking</button>
        </form>
      </div>
    <?php endforeach; ?>

  </div>
</div>

<?php include __DIR__ . '/../shared-footer.php'; ?>

</body>
</html>
