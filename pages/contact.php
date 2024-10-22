<?php
//inclure les fichiers necessaires
include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container">
    <h1>Contactez-moi</h1>
    <form action="send_mail.php" method="post">
        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

    <div class="map">
        <h2>Ma localisation</h2>
        <!-- intégration de la carte -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.9537353153169!3d-37.8162797797517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577d1e0c0b0b0b!2sMelbourne%20CBD%2C%20VIC%2C%20Australia!5e0!3m2!1sen!2sfr!4v1602817882386!5m2!1sen!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
