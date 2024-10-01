<?php include '../includes/header.php'; ?>
<main>
    <h1>Login</h1>
    <form action="authenticate.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>
</main>
<?php include '../includes/footer.php'; ?>
