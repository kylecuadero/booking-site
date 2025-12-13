<?php 
$page = 'booking';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Booking | Booking Site</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<style><?php include __DIR__ . '/shared-styles.css.php'; ?></style>
<style>

.nav-toggle {
  display: none;
  background: transparent;
  border: 1px solid rgba(255,255,255,0.06);
  color: var(--text);
  padding: 8px 10px;
  border-radius: 10px;
  font-weight:700;
}
@media (max-width: 900px) {
  .nav-links a{display:inline-block}
  .nav-toggle { display: inline-block; }
  .nav { align-items: center; }
}
.nav.open .nav-links {
  display: block !important;
  position: absolute;
  left: 0;
  right: 0;
  top: 64px;
  background: rgba(10,12,28,0.98);
  border-top: 1px solid var(--line);
  padding: 12px 16px;
  z-index: 2000;
  backdrop-filter: blur(8px);
}
.nav.open .nav-links a {
  display: block;
  margin: 8px 0;
}
.booking-hero {
  padding: 72px 0 18px;
}
@media (max-width:700px){
  .booking-hero { padding: 36px 0 8px; }
}

.booking-wrapper {
  width: 100%;
  max-width: 720px;
  margin: 0 auto 48px;
  padding: 0 16px;
  box-sizing: border-box;
}

.booking-card {
  background: var(--card);
  border: 1px solid var(--line);
  padding: 22px;
  border-radius: 14px;
  box-shadow: var(--shadow);
  backdrop-filter: blur(8px);
}

.booking-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 14px;
}
.booking-grid label {
  grid-column: span 2;
  font-weight:600;
}
.booking-grid input,
.booking-grid select {
  grid-column: span 2;
}

@media (max-width:700px){
  .booking-grid {
    grid-template-columns: 1fr;
    gap:12px;
  }
  .booking-grid label,
  .booking-grid input,
  .booking-grid select {
    grid-column: span 1;
  }
  .booking-card { padding: 16px; }
}

.search-btn {
  padding: 12px 16px;
  border-radius: 10px;
  font-weight:800;
}

.footer {
  margin-top: 28px;
}
</style>
</head>
<body>

<?php include __DIR__ . '/shared-nav.php'; ?>

<?php
// FIXED: removed accidental duplicated <?php
$movies = [
  ['Nightfall City','assets/m1.jpg','Sci-Fi • 2h 10m'],
  ['Red Horizon','assets/m2.jpg','Action • 1h 58m'],
  ['Quiet Echo','assets/m3.jpg','Drama • 2h 04m'],
  ['Neon Drift','assets/m4.jpg','Thriller • 1h 45m'],
];

$sports = [
  ['City FC vs United','assets/s1.jpg','Football • Sat 6 PM'],
  ['Racers Grand Prix','assets/s2.jpg','Racing • Sun 1 PM'],
  ['Pro Hoops','assets/s3.jpg','Basketball • Fri 8 PM'],
];

$events = [
  ['Acoustic Nights','assets/e1.jpg','Live Music • Fri 8 PM'],
  ['City Theatre','assets/e2.jpg','Drama • Sat 7 PM'],
  ['Tech Expo','assets/e3.jpg','Expo • Sun 10 AM'],
];
?>
<!-- booking form here -->

<script>
  const movies = <?php echo json_encode(array_column($movies, 0)); ?>;
  const events = <?php echo json_encode(array_column($events, 0)); ?>;
  const sports = <?php echo json_encode(array_column($sports, 0)); ?>;

  function updateOptions() {
    const cat = document.getElementById('category').value;
    const item = document.getElementById('item');

    item.innerHTML = '<option value="">-- Select Item --</option>';

    let list = [];
    if (cat === 'movie') list = movies;
    else if (cat === 'event') list = events;
    else if (cat === 'sport') list = sports;

    list.forEach(name => {
      const opt = document.createElement('option');
      opt.value = name;
      opt.textContent = name;
      item.appendChild(opt);
    });
  }
</script>

<!-- HERO -->
<div class="hero booking-hero" id="top">
  <div class="container" style="text-align:center;">
    <h1>Book Your Tickets</h1>
    <p style="max-width:720px;margin:8px auto 0;">
      Select a movie, event, or sports match — your next experience awaits.
    </p>
  </div>
</div>

<?php if (isset($_GET['success'])): ?>
  <div style="
    max-width:720px;
    margin:0 auto 16px;
    padding:14px;
    border-radius:12px;
    background:rgba(34,197,94,0.12);
    border:1px solid rgba(34,197,94,0.35);
    color:#22c55e;
    text-align:center;
    font-weight:700;
  ">
    ✅ Booking successful! A confirmation email has been sent.
  </div>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
  <div style="
    max-width:720px;
    margin:0 auto 16px;
    padding:14px;
    border-radius:12px;
    background:rgba(239,68,68,0.12);
    border:1px solid rgba(239,68,68,0.35);
    color:#ef4444;
    text-align:center;
    font-weight:700;
  ">
    ❌ Please fill in all fields correctly.
  </div>
<?php endif; ?>

<div class="booking-wrapper">
  <form action="booking-process.php" method="POST" class="booking-card" aria-label="Booking form">

    <div style="text-align:center;margin-bottom:10px;">
      <div style="font-weight:700;font-size:18px;color:var(--muted)">Booking Details</div>
    </div>

    <div class="booking-grid">

      <label for="category">Category</label>
      <select id="category" name="category" class="input" required onchange="updateOptions()">
        <option value="">-- Select Category --</option>
        <option value="movie">Movies</option>
        <option value="event">Events</option>
        <option value="sport">Sports</option>
      </select>

      <label for="item">Select Item</label>
      <select id="item" name="item" class="input" required>
        <option value="">-- Select Category First --</option>
      </select>

      <label for="customer_name">Your Name</label>
      <input id="customer_name" name="customer_name" type="text" class="input" placeholder="Full Name" required>

      <label for="customer_email">Email</label>
      <input id="customer_email" name="customer_email" type="email" class="input" placeholder="Email" required>

      <label for="date">Booking Date</label>
      <input id="date" name="date" type="date" class="input" required>

    </div>

    <div style="margin-top:14px;">
      <button class="search-btn" type="submit">Confirm Booking</button>
    </div>

  </form>
</div>

<script>
// mobile nav toggle
(function(){
  const nav = document.querySelector('.nav');
  if(!nav) return;

  if(!nav.querySelector('.nav-toggle')){
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'nav-toggle';
    btn.setAttribute('aria-expanded','false');
    btn.setAttribute('aria-label','Open menu');
    btn.textContent = 'Menu';

    const links = nav.querySelector('.nav-links');
    if(links) nav.insertBefore(btn, links);

    btn.addEventListener('click', ()=>{
      const isOpen = nav.classList.toggle('open');
      btn.setAttribute('aria-expanded', String(isOpen));
      btn.textContent = isOpen ? 'Close' : 'Menu';
    });
  }
})();

</script>

<?php include __DIR__ . '/shared-footer.php'; ?>

</body>
</html>
