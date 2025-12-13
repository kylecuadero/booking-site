<?php
if(!isset($page)) $page='index';
?>
<nav class="nav">
  <div class="container nav-inner">
    <div class="logo"><a href="index.php">BOOKING SITE</a></div>
    <div class="nav-links">
      <a class="<?php echo $page==='movies'?'active':''?>" href="movies.php">MOVIES</a>
      <a class="<?php echo $page==='events'?'active':''?>" href="events.php">EVENTS</a>
      <a class="<?php echo $page==='sports'?'active':''?>" href="sports.php">SPORTS</a>
      <a class="<?php echo $page==='blog'?'active':''?>" href="blog.php">BLOG</a>
      <a class="<?php echo $page==='contact'?'active':''?>" href="contact.php">CONTACT</a>
      <a class="cta" href="book.php">Book Now</a>
    </div>
  </div>
</nav>
