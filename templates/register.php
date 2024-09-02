<section class="register">
    <h1 class="page-title">Register</h1>
    <form action="register.php" method="post" class="form">
        <div class="form-group">
            <label for="username" class="form-label">Username:</label>
            <input type="text" id="username" name="username" required class="form-input">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" required class="form-input">
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" required class="form-input">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</section>