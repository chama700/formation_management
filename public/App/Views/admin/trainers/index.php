<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Liste des formateurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function confirmDelete(event) {
            const confirmation = confirm("Êtes-vous sûr de vouloir supprimer ce formateur ?");
            if (!confirmation) {
                event.preventDefault();
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans leading-relaxed">
<div class="max-w-7xl mx-auto px-6 py-8">

    <!-- Titre -->
    <h1 class="text-4xl font-bold text-center mb-10 text-blue-700">Liste des Formateurs</h1>

    <!-- Formulaire de filtrage -->
    <div class="bg-white p-6 rounded-xl shadow-sm mb-8">
        <form action="/admin/trainers" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="filter_id" class="block font-medium mb-1">Filtrer par ID :</label>
                <input type="text" id="filter_id" name="filter_id" value="<?php echo isset($_GET['filter_id']) ? htmlspecialchars($_GET['filter_id']) : ''; ?>" placeholder="ID du formateur" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="filter_name" class="block font-medium mb-1">Filtrer par nom :</label>
                <input type="text" id="filter_name" name="filter_name" value="<?php echo isset($_GET['filter_name']) ? htmlspecialchars($_GET['filter_name']) : ''; ?>" placeholder="Nom du formateur" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="flex items-end space-x-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
                    Filtrer
                </button>
                <a href="/admin/trainers"
                   class="bg-blue-500 text-white py-2 px-7 rounded-lg hover:bg-blue-700 transition duration-300">
                    Effacer les filtres
                </a>
            </div>
        </form>
    </div>

    <!-- Bouton Ajouter -->
    <div class="text-right mb-6">
        <a href="/admin/trainers/create" class="inline-block bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition shadow">+ Ajouter un formateur</a>
    </div>

    <!-- Tableau -->
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-6 py-3 text-left font-semibold">ID</th>
                <th class="px-6 py-3 text-left font-semibold">Nom</th>
                <th class="px-6 py-3 text-left font-semibold">Description</th>
                <th class="px-6 py-3 text-left font-semibold">Photo</th>
                <th class="px-6 py-3 text-left font-semibold">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <?php if ($trainers): ?>
                <?php foreach ($trainers as $trainer): ?>
                    <?php if (isset($_GET['edit_id']) && $_GET['edit_id'] == $trainer['id']): ?>
                        <!-- Ligne édition -->
                        <tr class="bg-yellow-50">
                            <form action="/admin/trainers/update/<?= $trainer['id'] ?>" method="POST" enctype="multipart/form-data">
                                <td class="px-6 py-4 font-medium"><?= $trainer['id'] ?></td>
                                <td class="px-6 py-4">
                                    <input type="text" name="name" value="<?= htmlspecialchars($trainer['firstName'] . ' ' . $trainer['lastName']) ?>" class="w-full border rounded px-3 py-1">
                                </td>
                                <td class="px-6 py-4">
                                    <textarea name="description" class="w-full border rounded px-3 py-1"><?= htmlspecialchars($trainer['description']) ?></textarea>
                                </td>
                                <td class="px-6 py-4">
                                    <?php if ($trainer['photo']): ?>
                                        <img src="<?= htmlspecialchars($trainer['photo']) ?>" alt="photo" class="w-12 h-12 rounded mb-2 object-cover">
                                    <?php endif; ?>
                                    <input type="file" name="photo" class="w-full">
                                </td>
                                <td class="px-6 py-4 space-x-2">
                                    <button type="submit" class="text-green-600 hover:text-green-800 font-semibold">✔ Enregistrer</button>
                                    <a href="/admin/trainers" class="text-gray-500 hover:underline">Annuler</a>
                                </td>
                            </form>
                        </tr>
                    <?php else: ?>
                        <!-- Ligne normale -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium"><?= $trainer['id'] ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($trainer['firstName'] . ' ' . $trainer['lastName']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($trainer['description']) ?></td>
                            <td class="px-6 py-4">
                                <?php if ($trainer['photo']): ?>
                                    <img src="<?= htmlspecialchars($trainer['photo']) ?>" alt="photo" class="w-12 h-12 rounded object-cover">
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 space-x-4">
                                <a href="/admin/trainers?edit_id=<?= $trainer['id'] ?>" class="text-blue-600 hover:text-blue-800 font-medium">Modifier</a>
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
    </div>

</div>
</body>
</html>
