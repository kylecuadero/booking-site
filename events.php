<?php $page='events'; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>MOVTIC — Events</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<style><?php include __DIR__ . '/shared-styles.css.php'; ?></style>
</head>
<body>
<?php include __DIR__ . '/shared-nav.php'; ?>

<header class="hero" style="padding:80px 0;background:linear-gradient(180deg,rgba(11,15,40,0.7),rgba(11,15,40,0.9)),url('assets/bg.jpg');background-size:cover;background-position:center;">
  <div class="container" style="text-align:center">
    <h1>Events</h1>
    <p>Concerts, theatre, stand-up — book your spot.</p>
  </div>
</header>

<section class="section">
  <div class="container">
    <div class="cards">
      <?php
      $events = [
        ['Acoustic Nights','assets/e1.jpg','Live Music • Fri 8 PM'],
        ['City Theatre','assets/e2.jpg','Drama • Sat 7 PM'],
        ['Tech Expo','assets/e3.jpg','Expo • Sun 10 AM'],
      ];
      foreach($events as $e){
        echo '<div class="card">
          <img src="'.htmlspecialchars($e[1]).'" alt="">
          <div class="pad">
            <h4>'.htmlspecialchars($e[0]).'</h4>
            <p>'.htmlspecialchars($e[2]).'</p>
            <div class="row">
              <span class="badge">Limited</span>
              <a class="badge" href="index.php?service='.rawurlencode('Event - '.$e[0]).'#book">Book</a>
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