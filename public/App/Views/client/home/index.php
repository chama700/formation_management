<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moodle - Solutions de Formation Professionnelle</title>
    <link rel="stylesheet" href="../../../../css/styles.css" />
</head>
<body>
<section class="hero">
    <div class="hero-overlay">
        <div class="hero-content">
            <h1>Moodle met le pouvoir de l'e-learning entre vos mains</h1>
            <p>
                Chez Moodle, notre mission est de permettre aux éducateurs d'améliorer le monde grâce à notre logiciel d'apprentissage en ligne open source.
                Flexible, sécurisé et personnalisable, Moodle s’adapte à toute initiative d’enseignement ou de formation en ligne.
                Il vous offre la liberté de créer une plateforme e-learning parfaitement adaptée à vos besoins.
            </p>
            <a href="/client/formations" class="btn-outline arrow-link">Voir les formations</a>
        </div>
    </div>
</section>

<section class="section" id="about">
    <div class="container">
        <h2 class="section-title">À Propos de Nous</h2>
        <div class="about-content">
            <div class="about-text">
                <h2>Moodle avec nous !</h2>
                <p>Moodle est la solution d'apprentissage en ligne la plus personnalisable et la plus fiable au
                    monde qui permet aux éducateurs d'améliorer notre monde.</p>
                <p>La communauté Moodle organise des événements et MoodleMoots (notre nom pour les conférences) dans le monde entier,
                    en mettant l'accent sur l'encouragement de la collaboration et le partage des meilleures pratiques de la plate-forme d'apprentissage open source.</p>
                <p>Nos prix et classements mondiaux reflètent notre engagement envers notre mission et nos clients au fil des ans.</p>
                <p>Moodle propose une gamme de solutions d'enseignement et de formation en ligne qui peuvent être adaptées à votre établissement ou organisation d'enseignement.
                    Répondez à quelques questions rapides pour savoir quelle solution Moodle et quelle méthode de configuration correspondent le mieux à vos besoins.</p>
            </div>
            <div class="about-image">
                <img src="../../../../images/about2.jpg" alt="Session de formation">
            </div>
        </div>
    </div>
</section>

<section class="section stats">
    <div class="container">
        <h2 class="section-title">Nos Performances</h2>
        <div class="stats-container">
            <div class="stat-item">
                <img src="../../../../images/stats-icon-1.svg" alt="stats">
                <h3>444,000,000+</h3>
                <p>Utilisateurs dans le monde</p>
            </div>
            <div class="stat-item">
                <img src="../../../../images/stats-icon-1.svg" alt="stats">
                <h3>3.1 Milliard+</h3>
                <p>Inscriptions aux cours</p>
            </div>
            <div class="stat-item">
                <img src="../../../../images/stats-icon-1.svg" alt="stats">
                <h3>50,000,000+</h3>
                <p>Cours en 42 langues</p>
            </div>
            <div class="stat-item">
                <img src="../../../../images/stats-icon-1.svg" alt="stats">
                <h3>148,000+</h3>
                <p>Sites Moodle</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Nos Formateurs</h2>
        <div class="trainers-grid">
            <?php foreach ($trainers as $trainer): ?>
                <div class="trainer-card">
                    <img src="<?= htmlspecialchars($trainer['photo']) ?>" alt="<?= htmlspecialchars($trainer['firstName']) ?> <?= htmlspecialchars($trainer['lastName']) ?>">
                    <h3><?= htmlspecialchars($trainer['firstName']) ?> <?= htmlspecialchars($trainer['lastName']) ?></h3>
                    <p><?= htmlspecialchars($trainer['description']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section domains" id="courses">
    <div class="container">
        <h2 class="section-title">Nos Domaines de Formation</h2>
        <div class="domain-grid">
            <?php foreach ($domains as $domain): ?>
                <div class="domain-box">
                    <h3 class="domain-title"><?= htmlspecialchars($domain['name']) ?></h3>
                    <p class="domain-description"><?= htmlspecialchars($domain['description']) ?></p>
                    <a href="/client/formations" class="domain-link">Voir les Formations →</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section cta">
    <div class="container">
        <h2 class="cta-title">Boostez Vos Compétences Avec Nos Formations Expert</h2>
        <p class="cta-description">Explorez nos formations variées, conçues pour répondre aux besoins des professionnels exigeants. Passez à la vitesse supérieure dès aujourd’hui !</p>
        <a href="/client/formations" class="cta-btn">Découvrir les Formations</a>
    </div>
</section>

</body>
</html>
