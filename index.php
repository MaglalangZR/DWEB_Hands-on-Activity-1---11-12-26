<?php
session_start();

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username !== "" && $password !== "") {
        $_SESSION['username'] = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Please enter both username and password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body class="minimal-body">

  <main class="login-wrapper">
    <div class="form-box">
      <h1>Sign In</h1>

      <?php if ($error !== ""): ?>
        <div class="alert-error" role="alert"><?php echo $error; ?></div>
      <?php endif; ?>

      <form action="index.php" method="POST">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required autofocus>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary btn-full">Login</button>
      </form>
    </div>
  </main>

</body>
</html>