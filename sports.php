<?php $page='sports'; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>MOVTIC — Sports</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<style><?php include __DIR__ . '/shared-styles.css.php'; ?></style>
</head>
<body>
<?php include __DIR__ . '/shared-nav.php'; ?>

<header class="hero" style="padding:80px 0;background:linear-gradient(180deg,rgba(11,15,40,0.7),rgba(11,15,40,0.9)),url('assets/bg.jpg');background-size:cover;background-position:center;">
  <div class="container" style="text-align:center">
    <h1>Sports</h1>
    <p>Catch the game. Reserve seats in seconds.</p>
  </div>
</header>

<section class="section">
  <div class="container">
    <div class="cards">
      <?php
      $sports = [
        ['City FC vs United','assets/s1.jpg','Football • Sat 6 PM'],
        ['Racers Grand Prix','assets/s2.jpg','Racing • Sun 1 PM'],
        ['Pro Hoops','assets/s3.jpg','Basketball • Fri 8 PM'],
      ];
      foreach($sports as $s){
        echo '<div class="card">
          <img src="'.htmlspecialchars($s[1]).'" alt="">
          <div class="pad">
            <h4>'.htmlspecialchars($s[0]).'</h4>
            <p>'.htmlspecialchars($s[2]).'</p>
            <div class="row">
              <span class="badge">Hot</span>
              <a class="badge" href="index.php?service='.rawurlencode('Sport - '.$s[0]).'#book">Book</a>
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