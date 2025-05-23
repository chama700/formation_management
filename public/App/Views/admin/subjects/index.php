<!-- views/admin/subject/index.php -->
<div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold text-center mb-10 text-blue-700">Liste des matières</h1>
    <!-- Formulaire de filtrage -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form action="/admin/subjects" method="GET" class="flex space-x-6">
            <div class="flex items-center space-x-2">
                <label for="filter_id" class="text-lg">Filtrer par ID :</label>
                <input type="text" id="filter_id" name="filter_id" value="<?php echo isset($_GET['filter_id']) ? htmlspecialchars($_GET['filter_id']) : ''; ?>" placeholder="ID du subject" class="border border-gray-300 rounded-lg px-4 py-2 w-40 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center space-x-2">
                <label for="filter_name" class="text-lg">Filtrer par nom :</label>
                <input type="text" id="filter_name" name="filter_name" value="<?php echo isset($_GET['filter_name']) ? htmlspecialchars($_GET['filter_name']) : ''; ?>" placeholder="Nom du subject" class="border border-gray-300 rounded-lg px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
                Appliquer
            </button>
        </form>
    </div>

    <div class="text-right mb-4">
        <a href="/admin/subjects/create" class="inline-block bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition shadow">+ Ajouter une matière</a>
    </div>
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200 text-gray-700">
        <tr>
            <th class="py-2 px-4 text-left">Nom</th>
            <th class="py-2 px-4 text-left">Description courte</th>
            <th class="py-2 px-4 text-left">Logo</th>
            <th class="py-2 px-4 text-left">Domaine</th>
            <th class="py-2 px-4 text-left">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($subjects as $subject): ?>
            <tr class="border-t">
                <td class="py-2 px-4"><?php echo htmlspecialchars($subject['name']); ?></td>
                <td class="py-2 px-4"><?php echo htmlspecialchars($subject['shortDescription']); ?></td>
                <td class="py-2 px-4">
                    <?php if ($subject['logo']): ?>
                        <img src="<?php echo $subject['logo']; ?>" alt="logo" class="h-10">
                    <?php endif; ?>
                </td>
                <td class="py-2 px-4"><?php echo htmlspecialchars($subject['domain_name']); ?></td>
                <td class="py-2 px-4">
                    <a href="/admin/subjects/edit/<?php echo $subject['id']; ?>" class="text-blue-500 hover:underline">Modifier</a>
                    <a href="/admin/subjects/delete/<?php echo $subject['id']; ?>" class="text-red-500 hover:underline ml-4" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
</div>