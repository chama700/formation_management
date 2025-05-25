<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Liste des Villes - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    </style>
    <script>
        function confirmDelete(event) {
            if (!confirm("Are you sure you want to delete this city?")) {
                event.preventDefault();
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="min-h-screen">

<div class="container max-w-7xl mx-auto p-6">
    <header class="mb-8">
        <h1 class="text-5xl font-extrabold text-center text-var(--moodle-blue)">
            Liste des Villes
        </h1>
        <p class="text-center mt-2 text-lg text-var(--moodle-gray-dark)">
            Tableau de bord pour gérer vos villes enregistrées
        </p>
    </header>

    <!-- Filters -->
    <section class="bg-white rounded-lg shadow-md p-6 mb-8">
        <form action="/admin/city" method="GET" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 items-end">

            <div>
                <label for="filter_id" class="block text-sm font-semibold text-[var(--moodle-gray-dark)] mb-1">ID</label>
                <input
                        type="text"
                        id="filter_id"
                        name="filter_id"
                        value="<?= htmlspecialchars($_GET['filter_id'] ?? '') ?>"
                        placeholder="ID ville"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-[var(--moodle-light-blue)] focus:outline-none"
                />
            </div>

            <div>
                <label for="filter_name" class="block text-sm font-semibold text-[var(--moodle-gray-dark)] mb-1">Nom</label>
                <input
                        type="text"
                        id="filter_name"
                        name="filter_name"
                        value="<?= htmlspecialchars($_GET['filter_name'] ?? '') ?>"
                        placeholder="Nom ville"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-[var(--moodle-light-blue)] focus:outline-none"
                />
            </div>

            <div>
                <label for="filter_country_id" class="block text-sm font-semibold text-[var(--moodle-gray-dark)] mb-1">Pays ID</label>
                <input
                        type="text"
                        id="filter_country_id"
                        name="filter_country_id"
                        value="<?= htmlspecialchars($_GET['filter_country_id'] ?? '') ?>"
                        placeholder="ID pays"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-[var(--moodle-light-blue)] focus:outline-none"
                />
            </div>

            <div>
                <label for="filter_country_name" class="block text-sm font-semibold text-[var(--moodle-gray-dark)] mb-1">Nom Pays</label>
                <input
                        type="text"
                        id="filter_country_name"
                        name="filter_country_name"
                        value="<?= htmlspecialchars($_GET['filter_country_name'] ?? '') ?>"
                        placeholder="Nom pays"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-[var(--moodle-light-blue)] focus:outline-none"
                />
            </div>

            <div class="col-span-full flex space-x-4 justify-end mt-2">
                <button
                        type="submit"
                        class="bg-[var(--moodle-blue)] hover:bg-[var(--moodle-light-blue)] text-white font-semibold py-2 px-6 rounded-md transition"
                >
                    Appliquer filtres
                </button>
                <a
                        href="/admin/city"
                        class="bg-[var(--moodle-orange)] hover:bg-[#e97400] text-white font-semibold py-2 px-6 rounded-md transition"
                >
                    Effacer les filtres
                </a>
            </div>
        </form>
    </section>

    <!-- Add city button -->
    <div class="text-right mb-6">
        <a
                href="/admin/city/create"
                class="inline-block bg-[var(--moodle-blue)] hover:bg-[var(--moodle-light-blue)] text-white font-semibold px-6 py-3 rounded-md shadow-lg transition"
        >+ Ajouter Ville</a
        >
    </div>

    <!-- Table -->
    <section class="bg-white rounded-lg shadow-md overflow-x-auto">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-[var(--moodle-blue)] text-white text-left">
            <tr>
                <th class="py-3 px-6 font-semibold">ID</th>
                <th class="py-3 px-6 font-semibold">Nom des Villes</th>
                <th class="py-3 px-6 font-semibold">ID Pays</th>
                <th class="py-3 px-6 font-semibold">Nom des Pays</th>
                <th class="py-3 px-6 font-semibold">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($cities)): ?>
                <?php foreach ($cities as $city): ?>
                    <?php if (isset($_GET['edit_id']) && $_GET['edit_id'] == $city['id']): ?>
                        <!-- Edit row -->
                        <tr class="bg-yellow-100 border-b">
                            <form action="/admin/city/update/<?= $city['id'] ?>" method="POST">
                                <td class="py-2 px-6 font-mono text-gray-700"><?= $city['id'] ?></td>
                                <td class="py-2 px-6">
                                    <input
                                            type="text"
                                            name="name"
                                            value="<?= htmlspecialchars($city['name']) ?>"
                                            class="border border-gray-400 rounded-md px-2 py-1 w-full"
                                    />
                                </td>
                                <td class="py-2 px-6 font-mono"><?= htmlspecialchars($city['country_id']) ?></td>
                                <td class="py-2 px-6 font-mono"><?= htmlspecialchars($city['country_name']) ?></td>
                                <td class="py-2 px-6 space-x-4">
                                    <button type="submit" class="text-green-600 font-semibold hover:text-green-800">✔ Save</button>
                                    <a href="/admin/city" class="text-gray-600 hover:underline ml-4">Cancel</a>
                                </td>
                            </form>
                        </tr>
                    <?php else: ?>
                        <!-- Normal row -->
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-6"><?= $city['id'] ?></td>
                            <td class="py-3 px-6"><?= htmlspecialchars($city['name']) ?></td>
                            <td class="py-3 px-6"><?= htmlspecialchars($city['country_id']) ?></td>
                            <td class="py-3 px-6"><?= htmlspecialchars($city['country_name']) ?></td>
                            <td class="py-3 px-6 space-x-4">
                                <a href="/admin/city?edit_id=<?= $city['id'] ?>" class="text-[var(--moodle-light-blue)] hover:underline font-semibold">Modifier</a>
                                <a href="/admin/city/delete/<?= $city['id'] ?>" onclick="return confirmDelete(event)" class="text-[var(--moodle-orange)] hover:underline font-semibold ml-4">Supprimer</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-500 font-semibold">Aucune ville trouvée.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </section>
</div>

</body>
</html>
