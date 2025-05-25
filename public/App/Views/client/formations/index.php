<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moodle - Nos Formations</title>
    <link rel="stylesheet" href="../../../../css/formations.css" />
    <link rel="stylesheet" href="../../../../css/styles.css" />
</head>
<body>

<section class="section">
    <div class="container">

        <section class="course-search">
            <div class="container">
                <h2 class="section-title">Explorez Nos Formations</h2>
                <p class="section-subtitle">Trouvez facilement la formation qui correspond à vos besoins et vos objectifs professionnels.</p>

                <form id="filter-form" class="search-form">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="domain">Thématique</label>
                            <select id="domain" name="domain">
                                <option value="">Toutes les thématiques</option>
                                <?php foreach ($domains as $domain): ?>
                                    <option value="<?= htmlspecialchars($domain['id']) ?>"
                                        <?= (isset($filters['domain_id']) && $filters['domain_id'] == $domain['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($domain['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subject">Spécialité</label>
                            <select id="subject" name="subject">
                                <option value="">Toutes les spécialités</option>
                                <?php foreach ($subjects as $subject): ?>
                                    <option value="<?= htmlspecialchars($subject['id']) ?>"
                                        <?= (isset($filters['subject_id']) && $filters['subject_id'] == $subject['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($subject['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="course">Formation</label>
                            <select id="course" name="course">
                                <option value="">Toutes les formations</option>
                                <?php foreach ($courses as $course): ?>
                                    <option value="<?= htmlspecialchars($course['id']) ?>"
                                        <?= (isset($filters['course_id']) && $filters['course_id'] == $course['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($course['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="city_id">Lieu</label>
                            <select id="city_id" name="city_id">
                                <option value="">Tous les lieux</option>
                                <?php foreach ($cities as $city): ?>
                                    <option value="<?= htmlspecialchars($city['id']) ?>"
                                        <?= (isset($filters['city_id']) && $filters['city_id'] == $city['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($city['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="reset" class="btn btn-outline">Réinitialiser</button>
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </div>
                </form>
            </div>
        </section>

        <section class="section formation-section">
            <div class="container">
                <div class="formation-grid">
                    <?php foreach ($formations as $formation): ?>
                        <div class="formation-card"
                             data-domain-id="<?= htmlspecialchars($formation['domain_id']) ?>"
                             data-subject-id="<?= htmlspecialchars($formation['subject_id']) ?>"
                             data-course-id="<?= htmlspecialchars($formation['course_id']) ?>"
                             data-city-id="<?= htmlspecialchars($formation['city_id']) ?>">

                            <div class="formation-card-header">
                                <img src="<?= htmlspecialchars($formation['courses_logo']) ?>"
                                     alt="<?= htmlspecialchars($formation['course_name']) ?>"
                                     class="formation-logo">
                            </div>

                            <div class="formation-card-body">
                                <h3 class="formation-title"><?= htmlspecialchars($formation['title'] ?? $formation['course_name']) ?></h3>

                                <ul class="formation-meta">
                                    <li><strong>Domaine :</strong> <?= htmlspecialchars($formation['domain_name']) ?></li>
                                    <li><strong>Sujet :</strong> <?= htmlspecialchars($formation['subject_name']) ?></li>
                                </ul>

                                <ul class="formation-details">
                                    <li><span class="icon">📍</span> <?= htmlspecialchars($formation['city_name']) ?></li>
                                    <li><span class="icon">📅</span> <?= htmlspecialchars($formation['start_date'] ?? 'À déterminer') ?></li>
                                    <li><span class="icon">👨‍🏫</span> <?= htmlspecialchars($formation['trainer_name']) ?></li>
                                    <li>
                                        <span class="icon"><?= $formation['mode'] === 'online' ? '🖥️' : '🏢' ?></span>
                                        <?= $formation['mode'] === 'online' ? 'En ligne' : 'Sur site' ?>
                                    </li>
                                </ul>
                            </div>

                            <div class="formation-card-footer">
                                <span class="formation-price">€<?= htmlspecialchars($formation['price']) ?></span>
                                <a href="registration/index/<?= $formation['id'] ?>" class="btn btn-primary">S'inscrire</a>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('filter-form');

        const citySelect = document.getElementById('city_id');
        const domainSelect = document.getElementById('domain');
        const subjectSelect = document.getElementById('subject');
        const courseSelect = document.getElementById('course');

        const formationCards = document.querySelectorAll('.formation-card');

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const selectedCity = citySelect.value;
            const selectedDomain = domainSelect.value;
            const selectedSubject = subjectSelect.value;
            const selectedCourse = courseSelect.value;

            formationCards.forEach(card => {
                const cityId = card.getAttribute('data-city-id');
                const domainId = card.getAttribute('data-domain-id');
                const subjectId = card.getAttribute('data-subject-id');
                const courseId = card.getAttribute('data-course-id');

                const matchCity = !selectedCity || cityId === selectedCity;
                const matchDomain = !selectedDomain || domainId === selectedDomain;
                const matchSubject = !selectedSubject || subjectId === selectedSubject;
                const matchCourse = !selectedCourse || courseId === selectedCourse;

                if (matchCity && matchDomain && matchSubject && matchCourse) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        form.addEventListener('reset', function () {
            setTimeout(() => {
                formationCards.forEach(card => {
                    card.style.display = '';
                });
            }, 0);
        });
    });
</script>

</body>
</html>
