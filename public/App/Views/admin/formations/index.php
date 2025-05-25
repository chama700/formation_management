<main class="p-8">
<header class="mb-8">
    <h1 class="text-5xl font-extrabold text-center text-text-[#0055CC]">
        Liste des formations
    </h1>
    <p class="text-center mt-2 text-lg text-[var(--moodle-gray-dark)]">
        Tableau de bord pour gérer vos formations enregistrées
    </p>
</header>
<!-- Filter Form -->
<form method="GET" class="bg-white p-6 rounded-lg shadow-md mb-8">
    <div class="flex flex-wrap gap-4 items-end">

        <div class="flex flex-col">
            <label for="filter_price" class="font-semibold text-[var(--moodle-gray-dark)] mb-1">Prix</label>
            <input
                    type="number"
                    name="filter_price"
                    id="filter_price"
                    value="<?= $_GET['filter_price'] ?? '' ?>"
                    class="w-32 px-3 py-2 rounded border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[var(--moodle-blue)]"
            >
        </div>

        <div class="flex flex-col">
            <label for="filter_mode" class="font-semibold text-[var(--moodle-gray-dark)] mb-1">Mode</label>
            <select
                    name="filter_mode"
                    id="filter_mode"
                    class="px-3 py-2 rounded border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[var(--moodle-blue)]"
            >
                <option value="">Tous</option>
                <option value="présentiel" <?= ($_GET['filter_mode'] ?? '') === 'présentiel' ? 'selected' : '' ?>>Présentiel</option>
                <option value="distanciel" <?= ($_GET['filter_mode'] ?? '') === 'distanciel' ? 'selected' : '' ?>>Distanciel</option>
            </select>
        </div>

        <div class="flex flex-col">
            <label for="filter_course_id" class="font-semibold text-[var(--moodle-gray-dark)] mb-1">Cours</label>
            <select
                    name="filter_course_id"
                    id="filter_course_id"
                    class="px-3 py-2 rounded border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[var(--moodle-blue)]"
            >
                <option value="">Tous</option>
                <?php foreach ($courses as $course): ?>
                    <option value="<?= $course['id'] ?>" <?= ($_GET['filter_course_id'] ?? '') == $course['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($course['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="flex flex-col">
            <label for="filter_city_id" class="font-semibold text-[var(--moodle-gray-dark)] mb-1">Ville</label>
            <select
                    name="filter_city_id"
                    id="filter_city_id"
                    class="px-3 py-2 rounded border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[var(--moodle-blue)]"
            >
                <option value="">Toutes</option>
                <?php foreach ($cities as $city): ?>
                    <option value="<?= $city['id'] ?>" <?= ($_GET['filter_city_id'] ?? '') == $city['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($city['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="flex flex-col">
            <label for="filter_trainer_id" class="font-semibold text-[var(--moodle-gray-dark)] mb-1">Formateur</label>
            <select
                    name="filter_trainer_id"
                    id="filter_trainer_id"
                    class="px-3 py-2 rounded border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[var(--moodle-blue)]"
            >
                <option value="">Tous</option>
                <?php foreach ($trainers as $trainer): ?>
                    <option value="<?= $trainer['id'] ?>" <?= ($_GET['filter_trainer_id'] ?? '') == $trainer['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($trainer['firstName']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="flex space-x-3">
            <button type="submit" class="bg-[var(--moodle-light-blue)] hover:bg-[var(--moodle-blue)] text-white px-5 py-2 rounded-lg font-medium transition-shadow shadow-md hover:shadow-lg">
                Filtrer
            </button>
            <a href="/admin/formations" class="bg-[var(--moodle-orange)] hover:bg-orange-600 text-white px-5 py-2 rounded-lg font-medium transition-shadow shadow-md hover:shadow-lg">
                Effacer les filtres
            </a>
        </div>

    </div>
</form>

<a href="/admin/formations/create" class="inline-block mb-6 bg-[var(--moodle-blue)] hover:bg-[var(--moodle-light-blue)] text-white px-6 py-3 rounded-lg font-semibold shadow-md transition-transform transform hover:-translate-y-1 hover:shadow-lg">
    Ajouter une formation
</a>

<table class="min-w-full bg-white rounded-lg overflow-hidden shadow-md">
    <thead class="bg-gray-100 text-[var(--moodle-gray-dark)] text-left text-sm font-semibold">
    <tr>
        <th class="p-4">Prix</th>
        <th class="p-4">Mode</th>
        <th class="p-4">Cours</th>
        <th class="p-4">Ville</th>
        <th class="p-4">Formateur</th>
        <th class="p-4">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($formations as $formation): ?>
        <tr class="hover:bg-gray-50 border-t border-gray-200 text-sm">
            <td class="p-4"><?= $formation['price'] ?> €</td>
            <td class="p-4"><?= ucfirst($formation['mode']) ?></td>
            <td class="p-4"><?= htmlspecialchars($formation['course_name']) ?></td>
            <td class="p-4"><?= htmlspecialchars($formation['city_name']) ?></td>
            <td class="p-4"><?= htmlspecialchars($formation['trainer_name']) ?></td>
            <td class="p-4">
                <a
                        href="/admin/formations/delete/<?= $formation['id'] ?>"
                        onclick="return confirm('Supprimer ?')"
                        class="text-red-600 hover:underline font-medium"
                >
                    Supprimer
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</main>

<!-- Responsive table for mobile -->
<style>
    @media (max-width: 768px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }
        thead tr {
            display: none;
        }
        tr {
            margin-bottom: 1rem;
            background: white;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 8px rgb(0 0 0 / 0.05);
        }
        td {
            position: relative;
            padding-left: 50%;
            text-align: left;
            border-top: none !important;
            font-size: 14px;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        td::before {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 45%;
            white-space: nowrap;
            font-weight: 600;
            color: var(--moodle-gray-dark);
        }
        td:nth-of-type(1)::before { content: "Prix"; }
        td:nth-of-type(2)::before { content: "Mode"; }
        td:nth-of-type(3)::before { content: "Cours"; }
        td:nth-of-type(4)::before { content: "Ville"; }
        td:nth-of-type(5)::before { content: "Formateur"; }
        td:nth-of-type(6)::before { content: "Actions"; }
    }
</style>

</body>
