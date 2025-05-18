<!-- views/admin/subject/index.php -->
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Liste des matières</h1>

    <div class="text-right mb-4">
        <a href="/admin/subjects/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ajouter une matière</a>
    </div>

    <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead class="bg-gray-200">
        <tr>
            <th class="px-4 py-2">Nom</th>
            <th class="px-4 py-2">Description courte</th>
            <th class="px-4 py-2">Logo</th>
            <th class="px-4 py-2">Domaine</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($subjects as $subject): ?>
            <tr class="border-t">
                <td class="px-4 py-2"><?php echo htmlspecialchars($subject['name']); ?></td>
                <td class="px-4 py-2"><?php echo htmlspecialchars($subject['shortDescription']); ?></td>
                <td class="px-4 py-2">
                    <?php if ($subject['logo']): ?>
                        <img src="<?php echo $subject['logo']; ?>" alt="logo" class="h-10">
                    <?php endif; ?>
                </td>
                <td class="px-4 py-2"><?php echo htmlspecialchars($subject['domain_name']); ?></td>
                <td class="px-4 py-2">
                    <a href="/admin/subjects/edit/<?php echo $subject['id']; ?>" class="text-blue-500 hover:underline">Modifier</a>
                    <a href="/admin/subjects/delete/<?php echo $subject['id']; ?>" class="text-red-500 hover:underline ml-4" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>