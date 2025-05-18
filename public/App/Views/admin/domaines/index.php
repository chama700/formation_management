<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Domaines</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center text-blue-800">Gestion des Domaines</h1>
    <div class="text-right mb-4">
        <a href="/admin/domaines/create" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Add a domaines</a>
    </div>
    <!-- Liste des domaines -->
    <table class="min-w-full bg-white border border-gray-200 rounded shadow-sm">
        <thead class="bg-blue-600 text-white">
        <tr>
            <th class="p-3 border">ID</th>
            <th class="p-3 border">Nom</th>
            <th class="p-3 border">Description</th>
            <th class="p-3 border">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($domaines as $domaine): ?>
            <tr class="border-b hover:bg-gray-50">
                <?php if (isset($_GET['edit_id']) && $_GET['edit_id'] == $domaine['id']): ?>
                    <!-- Formulaire d’édition en ligne -->
                    <form method="POST">
                        <td class="p-3"><?= $domaine['id'] ?>
                            <input type="hidden" name="id" value="<?= $domaine['id'] ?>">
                        </td>
                        <td class="p-3">
                            <input type="text" name="name" value="<?= htmlspecialchars($domaine['name']) ?>"
                                   class="w-full p-1 border rounded">
                        </td>
                        <td class="p-3">
                            <input type="text" name="description" value="<?= htmlspecialchars($domaine['description']) ?>"
                                   class="w-full p-1 border rounded">
                        </td>
                        <td class="p-3">
                            <button type="submit" name="modifier"
                                    class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Submit</button>
                            <a href="/admin/domaines"
                               class="ml-2 text-gray-600 hover:underline">Annuler</a>
                        </td>
                    </form>
                <?php else: ?>
                    <!-- Ligne normale -->
                    <td class="p-3 text-center"><?= $domaine['id'] ?></td>
                    <td class="p-3"><?= htmlspecialchars($domaine['name']) ?></td>
                    <td class="p-3"><?= htmlspecialchars($domaine['description']) ?></td>
                    <td class="p-3 text-center">
                        <a href="?edit=<?= $domaine['id'] ?>" class="text-blue-600 hover:underline">Edite</a>
                        <form method="POST" class="inline">
                            <input type="hidden" name="id" value="<?= $domaine['id'] ?>">
                            <button type="submit" name="supprimer"
                                    class="text-red-600 hover:underline ml-2"
                                    onclick="return confirm('Supprimer ce domaine ?')">Delete</button>
                        </form>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    </div>
</div>

</body>
</html>
