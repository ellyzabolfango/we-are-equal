<?php
// Start session to access user login state
session_start();
?>

<!-- Document type declaration for HTML5 -->
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Character encoding -->
  <meta charset="UTF-8" />
  <!-- Responsive design for mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Page title -->
  <title>We Are Equal</title>

  <!-- Bootstrap 5.3.3 CSS from CDN for styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome 6.5.1 CSS for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

  <!-- Custom site CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <!-- Navigation bar using Bootstrap classes -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <!-- Brand / logo linking to homepage -->
      <a class="navbar-brand" href="index.php">We Are Equal</a>

      <!-- Responsive hamburger toggle button for mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar menu items -->
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
          <!-- Static navigation links -->
          <li class="nav-item"><a class="nav-link" href="index.php#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php#resources">Resources</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php#engagement">Engagement</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php#action">Action</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>

          <!-- User is logged in AND is admin -->
          <?php if (isset($_SESSION['user_id']) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <li class="nav-item"><a class="nav-link" href="story_list.php">Story List</a></li>
            <li class="nav-item"><a class="nav-link" href="admin.php">Admin Page</a></li>
            <li class="nav-item"><a class="nav-link" href="controller/auth_logout.php">Logout</a></li>

          <!-- User is logged in but NOT admin -->
          <?php elseif (isset($_SESSION['user_id'])): ?>
            <li class="nav-item"><a class="nav-link" href="story_list.php">Story List</a></li>
            <li class="nav-item"><a class="nav-link" href="controller/auth_logout.php">Logout</a></li>

          <!-- User is NOT logged in -->
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Spacer div to offset fixed-top navbar height -->
  <div class="pt-5 mt-4"></div>