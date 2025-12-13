<?php $page='contact'; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>MOVTIC — Contact</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<style><?php include __DIR__ . '/shared-styles.css.php'; ?></style>
</head>
<body>
<?php include __DIR__ . '/shared-nav.php'; ?>

<header class="hero" style="padding:80px 0;background:linear-gradient(180deg,rgba(11,15,40,0.7),rgba(11,15,40,0.9)),url('assets/bg.jpg');background-size:cover;background-position:center;">
  <div class="container" style="text-align:center">
    <h1>Contact Us</h1>
    <p>We usually respond within 1 business day.</p>
  </div>
</header>

<section class="section">
  <div class="container">
    <div class="box">
      <form class="form" onsubmit="alert('This is a demo. Hook up send_email.php or your mail provider.'); return false;">
        <div class="grid">
          <div class="col-6">
            <label for="cname">Name</label>
            <input id="cname" type="text" placeholder="Jane Doe" required>
          </div>
          <div class="col-6">
            <label for="cemail">Email</label>
            <input id="cemail" type="email" placeholder="jane@example.com" required>
          </div>
          <div class="col-12">
            <label for="cmsg">Message</label>
            <textarea id="cmsg" placeholder="How can we help?" required></textarea>
          </div>
        </div>
        <div class="actions">
          <button type="submit">Send Message</button>
        </div>
      </form>
    </div>
  </div>
</section>

<?php include __DIR__ . '/shared-footer.php'; ?>
</body>
</html>