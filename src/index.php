<?php
/**
 * Phantom Tech Solutions — Corporate Site
 * Template loader
 */

$page = isset($_GET['page']) ? $_GET['page'] : 'pages/home.php';

$siteMap = [
    'home'     => 'pages/home.php',
    'about'    => 'pages/about.php',
    'services' => 'pages/services.php',
    'careers'  => 'pages/careers.php',
    'contact'  => 'pages/contact.php',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Phantom Tech Solutions | Industrial Infrastructure Engineering</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header">
  <div class="header-inner">
    <a href="index.php" class="brand">
      <span class="brand-mark">PT</span>
      <span class="brand-name">Phantom&nbsp;Tech<em>Solutions</em></span>
    </a>
    <nav class="main-nav" id="mainNav">
      <a href="index.php?page=home">Home</a>
      <a href="index.php?page=about">About</a>
      <a href="index.php?page=services">Services</a>
      <a href="index.php?page=careers">Careers</a>
      <a href="index.php?page=contact">Contact</a>
    </nav>
    <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<main class="page-content">
<?php
    // Load requested template. Falls back to home if resolution fails.
    if (isset($siteMap[$page])) {
        $page = $siteMap[$page];
    }

    if (file_exists($page)) {
        include($page);
    } else {
        include('pages/home.php');
    }
?>
</main>

<footer class="site-footer">
  <div class="footer-inner">
    <div class="footer-col">
      <span class="brand-mark small">PT</span>
      <p>Phantom Tech Solutions designs and maintains industrial control &amp; infrastructure
      systems for utilities, ports, and manufacturing clients across the region.</p>
    </div>
    <div class="footer-col">
      <h4>Company</h4>
      <a href="index.php?page=about">About Us</a>
      <a href="index.php?page=services">Services</a>
      <a href="index.php?page=careers">Careers</a>
    </div>
    <div class="footer-col">
      <h4>Get in touch</h4>
      <a href="index.php?page=contact">Contact</a>
      <p class="muted">ops@phantomtechsolutions.example<br>+94 11 234 5678</p>
    </div>
  </div>
  <div class="footer-bottom">
    <span>&copy; <?php echo date("Y"); ?> Phantom Tech Solutions. All rights reserved.</span>
  </div>
</footer>

<script src="assets/js/script.js"></script>
</body>
</html>
