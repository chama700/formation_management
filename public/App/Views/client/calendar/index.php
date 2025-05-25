<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formations à venir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../../../../css/calendar.css">
    <link rel="stylesheet" href="../../../../css/styles.css">
</head>
<body>

<section class="section">
    <section class="banner">
        <div class="container">
            <h2 class="section-title">Nos prochaines formations</h2>
            <p class="section-subtitle">Explorez les sessions planifiées et réservez votre place pour développer vos compétences dès maintenant.</p>
        </div>
    </section>

    <section class="calendar-section">
        <div class="container">
            <?php foreach ($formations as $formation): ?>
                <div class="training-card">
                    <div class="training-title"><?= htmlspecialchars($formation['course_name']) ?></div>

                    <div class="training-info">
                        <div><i class="fas fa-calendar-alt"></i>
                            <?= implode(', ', array_map(fn($d) => date('j F Y', strtotime($d)), $formation['dates'])) ?>
                        </div>
                        <div>
                            <i class="<?= $formation['mode'] === 'distanciel' ? 'fas fa-desktop' : 'fas fa-map-marker-alt' ?>"></i>
                            <?= $formation['mode'] === 'distanciel' ? 'Formation en ligne' : htmlspecialchars($formation['city_name']) ?>
                        </div>
                        <div>
                            <i class="fas fa-chalkboard-teacher"></i>
                            <?= $formation['mode'] === 'distanciel' ? 'À distance' : 'En présentiel' ?>
                        </div>
                        <div class="training-price"><?= number_format((float)$formation['price'], 2, ',', ' ') ?> €</div>
                    </div>

                    <a href="registration/index/<?= $formation['id'] ?>" class="btn-register">Je m'inscris</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</section>

</body>
</html>
