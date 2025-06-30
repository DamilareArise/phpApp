<?php
  session_abort();
  session_start();
  $user = $_SESSION['user'] ?? null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simple Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">MyBlog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
              aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Articles</a></li>
          <li class="nav-item"><a class="nav-link" href="#">About</a></li>
          <li class="nav-item"><a class="nav-link" href="../views/postForm.php"><i class="bi bi-plus-circle text-primary"></i> Post </a></li>

          <?php if($user){ ?>
            
            <div class="dropdown">
              <button class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $user['email']?></a>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Profile</a></li>

                <?php if($user['is_admin']) {?>
                  <li><a class="dropdown-item" href="categoryForm.php"><i class="bi bi-plus-circle text-primary"></i> Category</a></li>
                <?php } ?>

                <li><a class="dropdown-item" href="change_password.php">Change password</a></li>
                <li><a class="dropdown-item" href="../controllers/logout.php">Logout</a></li>
              </ul>
            </div>

          <?php } else { ?>
            <li class="nav-item">
              <a class="btn btn-primary ms-3" href="login.php">Login</a>
            </li>
          <?php } ?>

        </ul>
      </div>
    </div>
  </nav>