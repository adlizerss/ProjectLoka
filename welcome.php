<?php
session_start(); // Memulai sesi

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.html"); // Redirect ke halaman login jika belum login
    exit;
}

// Ambil username dari sesi
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Untuk Chrome di Android -->
    <meta name="theme-color" content="#ff2d2d">
    <title>MindArt Studio - LOKA: The Elements of Art</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <img src="images/mindart1.png" alt="MindArt Studio Logo" class="logo-image">
        </div>
        <nav>
            <ul class="nav-menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="character.html">Character</a></li>
                <li><a href="login.html">Account</a></li>
            </ul>
        </nav>
        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <nav class="nav-links" id="nav-links">
            <ul>
              <li><a href="index.html">Home</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="character.html">Character</a></li>
              <li><a href="login.html">Account</a></li>
            </ul>
        </nav>
    </header>

    <main>
    <section class="spacer"></section>
        <!-- Main Content -->
    
    <div class="main-content">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
    </div>

    <section class="hero">
        <div class="play-button">
            <a href="https://adlizerss.itch.io/demo-loka-the-elemental-of-arts" class="btn-play">PLAY NOW</a>
        </div>
    </section>

    <!-- Section with Image -->
    <section class="image-section">
        <img src="images/cm.png" alt="Loka Character Image">
    </section>
    </main>

    <footer>
        <div class="footer-container">
            <p class="footer-text">2024 MindArt Studio. All Rights Reserved</p>
            <div class="social-icons">
                <a href="#"><img src="images/whatsapp.png" alt="WhatsApp"></a>
                <a href="#"><img src="images/discord.png" alt="Discord"></a>
                <a href="#"><img src="images/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="images/tiktok.png" alt="TikTok"></a>
                <a href="#"><img src="images/instagram.png" alt="Instagram"></a>
                <a href="#"><img src="images/twitter.png" alt="Email"></a>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('mobile-menu').addEventListener('click', function() {
          const navLinks = document.getElementById('nav-links');
          navLinks.classList.toggle('active');
        });
      </script>

    
</body>
</html>