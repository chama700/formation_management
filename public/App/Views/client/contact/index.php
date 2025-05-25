<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez Moodle</title>
    <link rel="stylesheet" href="../../../../css/contact.css">
    <link rel="stylesheet" href="../../../../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

<section class="section">
    <section class="banner">
        <div class="container">
            <h2 class="section-title">Contactez-nous</h2>
            <p class="section-subtitle">Vous avez des questions sur nos formations ? Notre équipe est là pour vous aider à trouver la solution adaptée.</p>
        </div>
    </section>
<main class="contact-main container">
    <section class="contact-card">
        <h2 class="section-title">Coordonnées</h2>
        <ul class="contact-list">
            <li>
                <strong>Adresse :</strong><br>
                10 rue de l'Éducation, 75002 Paris, France
            </li>
            <li>
                <strong>Téléphone :</strong><br>
                +33 (0)1 23 45 67 89
            </li>
            <li>
                <strong>Email :</strong><br>
                support@moodle.fr
            </li>
            <li>
                <strong>Heures d'ouverture :</strong><br>
                Du lundi au vendredi, de 9h à 17h
            </li>
        </ul>
    </section>

    <section class="contact-form-card">
        <h2 class="section-title">Envoyez-nous un message</h2>
        <form action="/client/contact/store" method="post" class="form">
            <div class="form-group">
                <label for="name">Nom complet</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="subject">Objet</label>
                <input type="text" id="subject" name="subject" required>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn">Envoyer</button>
        </form>
    </section>
</main>
</section>
</body>
</html>
