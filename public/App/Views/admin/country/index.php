<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestion des Pays - Dashboard</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --moodle-blue: #005a9c;
            --moodle-light-blue: #0078d4;
            --moodle-orange: #f58220;
            --moodle-gray-light: #f3f6f8;
            --moodle-gray-dark: #4a4a4a;
        }
        body {
            background-color: var(--moodle-gray-light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--moodle-gray-dark);
        }
        .btn-primary {
            background-color: var(--moodle-blue);
            color: white;
        }
        .btn-primary:hover {
            background-color: #08306b;
        }
        .btn-success {
            background-color: var(--moodle-orange);
            color: white;
        }
        .btn-success:hover {
            background-color: #c66f03;
        }
        /* Table header */
        thead {
            background-color: var(--moodle-blue);
            color: white;
        }
        /* Table row hover */
        tbody tr:hover {
            background-color: #dbe9f7;
        }
        /* Form inputs */
        input[type="text"] {
            border: 1.5px solid var(--moodle-blue);
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus {
            border-color: var(--moodle-orange);
            outline: none;
        }
    </style>

    <script>
        function confirmDelete(event) {
            if (!confirm("Êtes-vous sûr de vouloir supprimer ce pays ?")) {
                event.preventDefault();
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
<div class="container mx-auto p-8 max-w-7xl">
    <!-- Header -->
    <header class="mb-10">
        <h1 class="text-5xl font-extrabold text-center text-var(--moodle-blue)">Gestion des Pays</h1>
        <p class="text-center mt-2 text-lg text-var(--moodle-gray-dark)">Tableau de bord pour gérer vos pays enregistrés</p>
    </header>

    <!-- Dashboard cards + chart -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white rounded-lg shadow p-6 flex flex-col justify-center items-center">
            <h2 class="text-xl font-semibold mb-2 text-var(--moodle-blue)">Nombre total de pays</h2>
            <p class="text-4xl font-bold" id="totalCountries">0</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <canvas id="countryChart" aria-label="Graphique du nombre de pays" role="img"></canvas>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4 text-var(--moodle-blue)">Ajouter un nouveau pays</h2>
            <form action="/admin/country/store" method="POST" class="space-y-4">
                <label for="name" class="block font-medium text-var(--moodle-gray-dark)">Nom du pays :</label>
                <input type="text"
                        id="name"
                        name="name"
                        required
                        placeholder="Entrez le nom du pays"
                        class="w-full px-4 py-2 rounded-md"
                />
                <button type="submit" class="btn-success w-full py-2 rounded-md font-semibold hover:brightness-90 transition">
                    Enregistrer
                </button>
            </form>
        </div>
    </section>

    <!-- Filter form -->
    <section class="bg-white rounded-lg shadow p-6 mb-8">
        <form action="/admin/country" method="GET" class="flex flex-wrap gap-6 justify-center md:justify-start items-end">
            <div class="flex flex-col">
                <label for="filter_id" class="font-medium mb-1">Filtrer par ID :</label>
                <input
                        type="text"
                        id="filter_id"
                        name="filter_id"
                        value="<?= isset($_GET['filter_id']) ? htmlspecialchars($_GET['filter_id']) : '' ?>"
                        placeholder="ID du pays"
                        class="px-4 py-2 rounded-md"
                />
            </div>

            <div class="flex flex-col">
                <label for="filter_name" class="font-medium mb-1">Filtrer par nom :</label>
                <input
                        type="text"
                        id="filter_name"
                        name="filter_name"
                        value="<?= isset($_GET['filter_name']) ? htmlspecialchars($_GET['filter_name']) : '' ?>"
                        placeholder="Nom du pays"
                        class="px-4 py-2 rounded-md w-64"
                />
            </div>

            <div class="flex space-x-4">
                <button type="submit"
                        class="btn-primary px-6 py-2 rounded-md font-semibold hover:brightness-90 transition">
                    Appliquer filtres
                </button>
                <a href="/admin/country" class="bg-[var(--moodle-orange)] hover:bg-[#e97400] text-white font-semibold py-2 px-6 rounded-md transition">
                    Effacer les filtres
                </a>
            </div>
        </form>
    </section>

    <!-- Table -->
    <section class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full table-auto border-collapse">
            <thead>
            <tr>
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Nom</th>
                <th class="py-3 px-6 text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($countries): ?>
                <?php foreach ($countries as $country): ?>
                    <?php if (isset($_GET['edit_id']) && $_GET['edit_id'] == $country['id']): ?>
                        <tr class="border-t bg-yellow-50">
                            <form action="/admin/country/update/<?= $country['id'] ?>" method="POST">
                                <td class="py-3 px-6 font-mono"><?= $country['id'] ?></td>
                                <td class="py-3 px-6">
                                    <input type="text" name="name" value="<?= htmlspecialchars($country['name']) ?>" class="w-full px-3 py-1 border rounded-md" />
                                </td>
                                <td class="py-3 px-6 space-x-4">
                                    <button type="submit" class="text-green-600 hover:text-green-800 font-semibold">✔ Enregistrer</button>
                                    <a href="/admin/country" class="text-gray-600 hover:underline ml-2">Annuler</a>
                                </td>
                            </form>
                        </tr>
                    <?php else: ?>
                        <tr class="border-t hover:bg-blue-50 transition-colors">
                            <td class="py-3 px-6 font-mono"><?= $country['id'] ?></td>
                            <td class="py-3 px-6"><?= htmlspecialchars($country['name']) ?></td>
                            <td class="py-3 px-6 space-x-6">
                                <a href="/admin/country?edit_id=<?= $country['id'] ?>" class="text-[var(--moodle-light-blue)] hover:underline font-semibold">Modifier</a>
                                <a href="/admin/country/delete/<?= $country['id'] ?>" onclick="return confirmDelete(event)" class="text-[var(--moodle-orange)] hover:underline font-semibold ml-4">Supprimer</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center py-8 text-gray-500 italic">Aucun pays trouvé.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </section>
</div>

<script>
    const totalCountries = <?= count($countries ?? []) ?>;
    document.getElementById('totalCountries').textContent = totalCountries;

    const ctx = document.getElementById('countryChart').getContext('2d');

    const data = {
        labels: ['Pays enregistrés'],
        datasets: [{
            label: 'Nombre de pays',
            data: [totalCountries],
            backgroundColor: 'var(--moodle-orange)',
            borderColor: 'var(--moodle-blue)',
            borderWidth: 2,
            borderRadius: 6,
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: true,
                }
            }
        }
    };

    new Chart(ctx, config);
</script>
</body>
</html>
