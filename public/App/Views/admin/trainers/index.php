<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Formateurs - Moodle Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        moodleOrange: '#f67e0e',
                        moodleDarkBlue: '#0c2340',
                        moodleBlue: '#005aa7',
                        moodleGrayLight: '#f9fafb',
                        moodleGrayDark: '#374151'
                    }
                }
            }
        };

        function confirmDelete(event) {
            if (!confirm("Êtes-vous sûr de vouloir supprimer ce formateur ?")) {
                event.preventDefault();
                return false;
            }
            return true;
        }

        window.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('trainersChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Formateurs actifs',
                        data: [12, 19, 14, 23, 18, 25],
                        backgroundColor: '#f67e0e'
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#ddd'
                            },
                            ticks: {
                                color: '#0c2340',
                                font: { weight: 'bold' }
                            }
                        },
                        x: {
                            ticks: {
                                color: '#0c2340',
                                font: { weight: 'bold' }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: { color: '#0c2340', font: { weight: 'bold' } }
                        }
                    }
                }
            });
        });
    </script>
</head>
<body class="bg-moodleGrayLight text-moodleDarkBlue font-sans min-h-screen flex flex-col">

<main class="flex-grow mx-auto container mx-auto p-8 max-w-7xl">
    <!-- Header -->
    <header class="mb-8">
        <h1 class="text-5xl font-extrabold text-center text-var(--moodle-blue)">
            Dashboard Formateurs
        </h1>
        <p class="text-center mt-2 text-lg text-[var(--moodle-gray-dark)]">
            Tableau de bord pour gérer vos formateurs enregistrés
        </p>
        <nav class="text-center mt-6">
            <a href="/admin/trainers/create"
               class="inline-block bg-[var(--moodle-orange)] hover:bg-yellow-500 transition px-6 py-2 rounded shadow font-semibold text-white">
                + Ajouter un formateur
            </a>
        </nav>
    </header>
    <!-- Stats Cards -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
            <span class="text-3xl font-extrabold text-moodleOrange">58</span>
            <span class="mt-2 text-sm font-medium text-gray-600">Formateurs enregistrés</span>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
            <span class="text-3xl font-extrabold text-moodleBlue">24</span>
            <span class="mt-2 text-sm font-medium text-gray-600">Formateurs actifs ce mois</span>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
            <span class="text-3xl font-extrabold text-moodleDarkBlue">4.5</span>
            <span class="mt-2 text-sm font-medium text-gray-600">Note moyenne</span>
        </div>
    </section>

    <!-- Filtering Form -->
    <section class="bg-white p-6 rounded-xl shadow mb-8">
        <form action="/admin/trainers" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="filter_id" class="block font-semibold mb-1 text-moodleDarkBlue">Filtrer par ID :</label>
                <input type="text" id="filter_id" name="filter_id" value="<?php echo isset($_GET['filter_id']) ? htmlspecialchars($_GET['filter_id']) : ''; ?>" placeholder="ID du formateur" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-moodleOrange focus:border-moodleOrange" />
            </div>
            <div>
                <label for="filter_name" class="block font-semibold mb-1 text-moodleDarkBlue">Filtrer par nom :</label>
                <input type="text" id="filter_name" name="filter_name" value="<?php echo isset($_GET['filter_name']) ? htmlspecialchars($_GET['filter_name']) : ''; ?>" placeholder="Nom du formateur" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-moodleOrange focus:border-moodleOrange" />
            </div>
            <div class="flex items-end space-x-4">
                <button type="submit" class="bg-moodleOrange text-white py-2 px-6 rounded-lg hover:bg-yellow-500 transition font-semibold shadow">Filtrer</button>
                <a href="/admin/trainers" class="bg-moodleOrange text-white py-2 px-6 rounded-lg hover:bg-yellow-500 transition font-semibold shadow">Effacer</a>
            </div>
        </form>
    </section>

    <!-- Trainers Table -->
    <section class="bg-white rounded-xl shadow overflow-x-auto mb-12">
        <table class="min-w-full divide-y divide-gray-300 text-sm">
            <thead class="bg-moodleOrange/10 text-moodleDarkBlue font-semibold">
            <tr>
                <th class="px-6 py-3 text-left">ID</th>
                <th class="px-6 py-3 text-left">Nom</th>
                <th class="px-6 py-3 text-left">Description</th>
                <th class="px-6 py-3 text-left">Photo</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            <?php if ($trainers): ?>
                <?php foreach ($trainers as $trainer): ?>
                    <?php if (isset($_GET['edit_id']) && $_GET['edit_id'] == $trainer['id']): ?>
                        <!-- Edit Row -->
                        <tr class="bg-yellow-50">
                            <form action="/admin/trainers/update/<?= $trainer['id'] ?>" method="POST" enctype="multipart/form-data">
                                <td class="px-6 py-4 font-medium"><?= $trainer['id'] ?></td>
                                <td class="px-6 py-4">
                                    <input type="text" name="name" value="<?= htmlspecialchars($trainer['firstName'] . ' ' . $trainer['lastName']) ?>" class="w-full border border-gray-300 rounded px-3 py-1" />
                                </td>
                                <td class="px-6 py-4">
                                    <textarea name="description" class="w-full border border-gray-300 rounded px-3 py-1"><?= htmlspecialchars($trainer['description']) ?></textarea>
                                </td>
                                <td class="px-6 py-4">
                                    <?php if ($trainer['photo']): ?>
                                        <img src="<?= htmlspecialchars($trainer['photo']) ?>" alt="photo" class="w-12 h-12 rounded mb-2 object-cover" />
                                    <?php endif; ?>
                                    <input type="file" name="photo" class="w-full" />
                                </td>
                                <td class="px-6 py-4 space-x-3">
                                    <button type="submit" class="text-green-600 hover:text-green-800 font-semibold">✔ Enregistrer</button>
                                    <a href="/admin/trainers" class="text-gray-500 hover:underline">Annuler</a>
                                </td>
                            </form>
                        </tr>
                    <?php else: ?>
                        <!-- Normal Row -->
                        <tr class="hover:bg-moodleOrange/10 transition-colors duration-150">
                            <td class="px-6 py-4 font-medium"><?= $trainer['id'] ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($trainer['firstName'] . ' ' . $trainer['lastName']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($trainer['description']) ?></td>
                            <td class="px-6 py-4">
                                <?php if ($trainer['photo']): ?>
                                    <img src="<?= htmlspecialchars($trainer['photo']) ?>" alt="photo" class="w-12 h-12 rounded object-cover" />
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 space-x-6">
                                <a href="/admin/trainers?edit_id=<?= $trainer['id'] ?>" class="text-moodleBlue hover:text-moodleDarkBlue font-medium">Modifier</a>
                                <a href="/admin/trainers/delete/<?= $trainer['id'] ?>" onclick="return confirmDelete(event)" class="text-red-600 hover:text-red-800 font-medium">Supprimer</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" class="text-center py-6 text-gray-500">Aucun formateur trouvé.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </section>

    <!-- Chart Section -->
    <section class="bg-white rounded-xl shadow p-6">
        <h2 class="text-xl font-semibold mb-4 text-moodleDarkBlue">Statistiques des formateurs</h2>
        <canvas id="trainersChart" class="w-full max-w-4xl mx-auto" height="200"></canvas>
    </section>

</main>

</body>
</html>
