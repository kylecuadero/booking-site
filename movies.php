<?php $page='movies'; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Booking Site</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<style><?php include __DIR__ . '/shared-styles.css.php'; ?></style>
</head>
<body>
<?php include __DIR__ . '/shared-nav.php'; ?>

<header class="hero" style="padding:80px 0;background:linear-gradient(180deg,rgba(11,15,40,0.7),rgba(11,15,40,0.9)),url('assets/bg.jpg');background-size:cover;background-position:center;">
  <div class="container" style="text-align:center">
    <h1>Now Showing</h1>
    <p>Pick a movie and book your seats fast.</p>
  </div>
</header>

<section class="section">
  <div class="container">
    <div class="cards">
      <?php
      $movies = [
        ['Nightfall City','assets/m1.jpg','Sci‑Fi • 2h 10m'],
        ['Red Horizon','assets/m2.jpg','Action • 1h 58m'],
        ['Quiet Echo','assets/m3.jpg','Drama • 2h 04m'],
        ['Neon Drift','assets/m4.jpg','Thriller • 1h 45m'],
      ];
      foreach($movies as $m){
        echo '<div class="card">
          <img src="'.htmlspecialchars($m[1]).'" alt="">
          <div class="pad">
            <h4>'.htmlspecialchars($m[0]).'</h4>
            <p>'.htmlspecialchars($m[2]).'</p>
            <div class="row">
              <span class="badge">2D</span>
              <a class="badge" href="index.php?service='.rawurlencode('Movie - '.$m[0]).'#book">Book</a>
            </div>
          </div>
        </div>';
      }
      ?>
    </div>
  </div>
</section>

<?php include __DIR__ . '/shared-footer.php'; ?>
</body>
</html>
