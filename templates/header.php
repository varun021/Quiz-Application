<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <nav class="nav">
            <ul class="nav-list">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a href="categories.php" class="nav-link">Categories</a></li>
                    <li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
                    <li class="nav-item"><a href="leaderboard.php" class="nav-link">Leaderboard</a>
                    <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <main class="main-content">