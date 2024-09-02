<section class="login">
    <h1 class="page-title">Login</h1>
    <?php if (isset($error)): ?>
        <p class="error-message"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="login.php" method="post" class="form">
        <div class="form-group">
            <label for="username" class="form-label">Username:</label>
            <input type="text" id="username" name="username" required class="form-input">
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" required class="form-input">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</section>