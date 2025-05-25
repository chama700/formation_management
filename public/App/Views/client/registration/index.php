<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Inscription à la formation</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../../css/styles.css" />
    <link rel="stylesheet" href="../../../../css/registration.css" />
</head>
<body>
<section class="section">
    <section class="banner">
        <div class="container">
            <h2 class="section-title">Inscrivez-vous à cette formation</h2>
            <p class="section-subtitle">Découvrez notre large gamme de formations professionnelles conçues pour améliorer vos compétences et faire avancer votre carrière.</p>
        </div>
    </section>

    <?php if ($formation): ?>
        <section class="formation-info">
            <h3>Détails de la formation</h3>
            <div class="formation-summary">
                <p><strong>Titre :</strong> <?= htmlspecialchars($formation['title'] ?? $formation['course_name']) ?></p>
                <p><strong>Domaine :</strong> <?= htmlspecialchars($formation['domain_name']) ?></p>
                <p><strong>Sujet :</strong> <?= htmlspecialchars($formation['subject_name']) ?></p>
                <p><strong>Ville :</strong> <?= htmlspecialchars($formation['city_name']) ?></p>
                <p><strong>Date de début :</strong> <?= htmlspecialchars($formation['start_date'] ?? 'À déterminer') ?></p>
                <p><strong>Formateur :</strong> <?= htmlspecialchars($formation['trainer_name']) ?></p>
                <p><strong>Mode :</strong> <?= $formation['mode'] === 'online' ? 'En ligne' : 'Sur site' ?></p>
                <p><strong>Prix :</strong> €<?= htmlspecialchars($formation['price']) ?></p>
            </div>
        </section>
    <?php endif; ?>

    <form action="/client/registration/store" method="post">
        <h2>Formulaire d'inscription</h2>
        <input type="hidden" name="formation_id" value="<?= htmlspecialchars($formationId) ?>">

        <label>Prénom :</label><br>
        <input type="text" name="firstName" required><br>

        <label>Nom :</label><br>
        <input type="text" name="lastName" required><br>

        <label>Téléphone :</label><br>
        <input type="text" name="phone" required><br>

        <label>Email :</label><br>
        <input type="email" name="email" required><br>

        <label>Entreprise :</label><br>
        <input type="text" name="company" required><br>

        <label>Payé :</label>
        <div class="paid-group">
            <input type="radio" name="paid" value="1" id="paid_yes">
            <label for="paid_yes">Oui</label>

            <input type="radio" name="paid" value="0" id="paid_no" checked>
            <label for="paid_no">Non</label>
        </div>

        <button type="submit">Envoyer</button>
    </form>
</section>
</body>
</html>
