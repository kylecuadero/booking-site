<?php $page='blog'; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>MOVTIC — Blog</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<style><?php include __DIR__ . '/shared-styles.css.php'; ?></style>
</head>
<body>
<?php include __DIR__ . '/shared-nav.php'; ?>

<header class="hero" style="padding:80px 0;background:linear-gradient(180deg,rgba(11,15,40,0.7),rgba(11,15,40,0.9)),url('assets/bg.jpg');background-size:cover;background-position:center;">
  <div class="container" style="text-align:center">
    <h1>Blog</h1>
    <p>News, guides and tips.</p>
  </div>
</header>

<section class="section">
  <div class="container">
    <div class="cards">
      <?php
      $posts = [
        ['How to pick the best seats','assets/m3.jpg','Tips for an epic movie night.'],
        ['Event booking checklist','assets/e2.jpg','Make your night seamless.'],
        ['Sports day essentials','assets/s3.jpg','Arrive prepared and on time.'],
      ];
      foreach($posts as $p){
        echo '<div class="card">
          <img src="'.htmlspecialchars($p[1]).'" alt="">
          <div class="pad">
            <h4>'.htmlspecialchars($p[0]).'</h4>
            <p>'.htmlspecialchars($p[2]).'</p>
            <div class="row">
              <span class="badge">Read</span>
              <a class="badge" href="#">Open</a>
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