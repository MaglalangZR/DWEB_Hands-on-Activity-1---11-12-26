<?php
session_start();

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$loggedInUser = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Zion Russell M. Maglalang">
  <title>Dashboard | DWEB Studio</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body class="dashboard-body">

  <!-- Premium Header -->
  <header class="site-header">
    <div class="container nav-wrapper">
      <a href="dashboard.php" class="brand-logo">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
          <polyline points="2 17 12 22 22 17"></polyline>
          <polyline points="2 12 12 17 22 12"></polyline>
        </svg>
        <span>DWEB Studio</span>
      </a>

      <div class="nav-right">
        <div class="user-profile-badge">
          <span class="status-dot"></span>
          <span>Active: <strong><?php echo htmlspecialchars($loggedInUser, ENT_QUOTES, 'UTF-8'); ?></strong></span>
        </div>
        <a href="logout.php" class="btn btn-sm btn-outline">Sign Out</a>
      </div>
    </div>
  </header>

  <!-- Main Content Area -->
  <main class="dashboard-main">
    <div class="container">
      
      <!-- Welcome Hero Card -->
      <section class="welcome-hero">
        <div class="welcome-content">
          <span class="badge">Session Authenticated &bull; Hands on Activity 1</span>
          <h1>Welcome back, <?php echo htmlspecialchars($loggedInUser, ENT_QUOTES, 'UTF-8'); ?></h1>
          <p>Your session security token is active. Route protection prevents unauthorized access by enforcing automatic redirection to <code>index.php</code> when sessions are missing.</p>
          <div class="hero-actions">
            <a href="logout.php" class="btn btn-primary">Destroy Session &amp; Logout</a>
          </div>
        </div>
      </section>

      <!-- Grid Telemetry Cards -->
      <section class="telemetry-section">
        <div class="card-grid">
          <article class="premium-card">
            <div class="card-icon-box">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
            </div>
            <h3>Active Session Token</h3>
            <p>Stored securely inside <code>$_SESSION['username']</code> variable for state management across pages.</p>
          </article>

          <article class="premium-card">
            <div class="card-icon-box">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
              </svg>
            </div>
            <h3>Route Security Guard</h3>
            <p>Direct URL attempts to bypass authentication are intercepted via PHP header redirection.</p>
          </article>

          <article class="premium-card">
            <div class="card-icon-box">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
              </svg>
            </div>
            <h3>Session Destruction</h3>
            <p>Calling <code>logout.php</code> executes session termination and clears all stored variables instantly.</p>
          </article>
        </div>
      </section>

    </div>
  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="container footer-content">
      <p>&copy; 2026 Zion Russell M. Maglalang &mdash; DWEB Laboratory Studio</p>
    </div>
  </footer>

</body>
</html>