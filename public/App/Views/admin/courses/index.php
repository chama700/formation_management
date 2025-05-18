<!-- views/admin/courses/index.php -->
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Liste des cours</h2>
        <a href="/admin/courses/create" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
            Ajouter un cours
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold">Nom</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Sujet</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Durée</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            <?php foreach ($courses as $course): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['name']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['subject_name'] ?? '') ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['duration']) ?></td>
                    <td class="px-6 py-4 text-sm">
                        <a href="/admin/courses/edit/<?= $course['id'] ?>" class="text-blue-600 hover:underline">Modifier</a>
                        <span class="text-gray-400 mx-2">|</span>
                        <a href="/admin/courses/delete/<?= $course['id'] ?>"
                           onclick="return confirm('Supprimer ce cours ?')"
                           class="text-red-500 hover:underline">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
