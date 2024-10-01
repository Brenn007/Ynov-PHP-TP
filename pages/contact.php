<?php include '../includes/header.php'; ?>
<main class="container">
    <h1 class="mt-5">Contact Me</h1>
    <form action="send_mail.php" method="post" class="mt-4">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn">Send</button>
    </form>
    <div id="map" class="mt-4"></div>
</main>
<?php include '../includes/footer.php'; ?>
