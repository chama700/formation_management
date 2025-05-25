<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord des domaines</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function confirmDelete(event) {
            if (!confirm("Êtes-vous sûr de vouloir supprimer ce domaine ?")) {
                event.preventDefault();
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="bg-[#f4f7f8] text-gray-900 font-sans min-h-screen">

<div class="container">
    <!-- Main content -->
    <main class="p-6 md:col-span-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold">Gestion des domaines</h1>
            <a href="/admin/domaines/create" class="bg-[#f98012] text-white px-4 py-2 rounded-md hover:bg-[#e46f00]">+ Ajouter un domaine</a>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-sm text-gray-500">Total domaines</h3>
                <p class="text-2xl font-semibold"><?= count($domaines ?? []) ?></p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-sm text-gray-500">Actifs</h3>
                <p class="text-2xl font-semibold">15</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-sm text-gray-500">Inactifs</h3>
                <p class="text-2xl font-semibold">3</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-sm text-gray-500">Mise à jour récente</h3>
                <p class="text-2xl font-semibold">2 aujourd'hui</p>
            </div>
        </div>

        <!-- Chart -->
        <div class="bg-white p-6 rounded-lg shadow mb-10">
            <h2 class="text-lg font-semibold mb-4">Activité récente</h2>
            <canvas id="domainChart" height="100"></canvas>
        </div>

        <!-- Filters -->
        <form action="/admin/domaines" method="GET" class="bg-white p-4 rounded-lg shadow mb-6 grid md:grid-cols-3 gap-4">
            <div>
                <label for="filter_id" class="block text-sm font-medium text-gray-700">Filtrer par ID :</label>
                <input type="text" id="filter_id" name="filter_id" placeholder="ID du Domain" value="<?= htmlspecialchars($_GET['filter_id'] ?? '') ?>" class="w-full border border-[#222222] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F16522]">
            </div>
            <div>
                <label for="filter_name" class="block text-sm font-medium text-gray-700">Filtrer par nom :</label>
                <input type="text" id="filter_name" name="filter_name" placeholder="Nom du Domain" value="<?= htmlspecialchars($_GET['filter_name'] ?? '') ?>" class="w-full border border-[#222222] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F16522]">
            </div>
            <div class="flex items-end space-x-2">
                <button type="submit" class="bg-[#f98012] text-white px-4 py-2 rounded-md hover:bg-[#e46f00]">Filtrer</button>
                <a href="/admin/domaines" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Réinitialiser</a>
            </div>
        </form>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="w-full table-auto">
                <thead class="bg-[#002a3b] text-white">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Nom</th>
                    <th class="px-4 py-2 text-left">Description</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($domaines): ?>
                    <?php foreach ($domaines as $domaine): ?>
                        <?php if (isset($_GET['edit_id']) && $_GET['edit_id'] == $domaine['id']): ?>
                            <tr class="border-t bg-yellow-50">
                                <form action="/admin/domaines/update/<?= $domaine['id'] ?>" method="POST">
                                    <td class="px-4 py-2"><?= $domaine['id'] ?></td>
                                    <td class="px-4 py-2">
                                        <input type="text" name="name" value="<?= htmlspecialchars($domaine['name']) ?>" class="border rounded px-2 py-1 w-full">
                                    </td>
                                    <td class="px-4 py-2">
                                        <input type="text" name="description" value="<?= htmlspecialchars($domaine['description']) ?>" class="border rounded px-2 py-1 w-full">
                                    </td>
                                    <td class="px-4 py-2 space-x-2">
                                        <button type="submit" class="text-green-600 hover:underline">✔</button>
                                        <a href="/admin/domaines" class="text-gray-500 hover:underline">Annuler</a>
                                    </td>
                                </form>
                            </tr>
                        <?php else: ?>
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-2"><?= $domaine['id'] ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($domaine['name']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($domaine['description']) ?></td>
                                <td class="px-4 py-2 space-x-4">
                                    <a href="/admin/domaines?edit_id=<?= $domaine['id'] ?>" class="text-blue-600 hover:underline">Modifier</a>
                                    <a href="/admin/domaines/delete/<?= $domaine['id'] ?>" onclick="return confirmDelete(event)" class="text-red-600 hover:underline">Supprimer</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" class="text-center py-4">Aucun domaine trouvé.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

<!-- Chart script -->
<script>
    const ctx = document.getElementById('domainChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
            datasets: [{
                label: 'Modifications',
                data: [2, 4, 3, 5, 1, 0, 2],
                backgroundColor: '#f98012',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
</body>
</html>
