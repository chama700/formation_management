<div class="container mx-auto px-4 py-8">
    <h2 class="text-4xl font-bold text-center mb-10 text-blue-700">Liste des cours</h2>
    <!-- Formulaire de filtrage -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <form action="/admin/courses" method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- ID -->
            <div>
                <label for="filter_id" class="block text-sm font-medium text-gray-700">ID</label>
                <input type="text" id="filter_id" name="filter_id"
                       value="<?= isset($_GET['filter_id']) ? htmlspecialchars($_GET['filter_id']) : ''; ?>"
                       placeholder="ID du cours"
                       class="mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Nom -->
            <div>
                <label for="filter_name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" id="filter_name" name="filter_name"
                       value="<?= isset($_GET['filter_name']) ? htmlspecialchars($_GET['filter_name']) : ''; ?>"
                       placeholder="Nom du cours"
                       class="mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Contenu -->
            <div>
                <label for="filter_content" class="block text-sm font-medium text-gray-700">Contenu</label>
                <input type="text" id="filter_content" name="filter_content"
                       value="<?= isset($_GET['filter_content']) ? htmlspecialchars($_GET['filter_content']) : ''; ?>"
                       placeholder="Contenu"
                       class="mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Description -->
            <div>
                <label for="filter_description" class="block text-sm font-medium text-gray-700">Description</label>
                <input type="text" id="filter_description" name="filter_description"
                       value="<?= isset($_GET['filter_description']) ? htmlspecialchars($_GET['filter_description']) : ''; ?>"
                       placeholder="Description"
                       class="mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Public cible -->
            <div>
                <label for="filter_audience" class="block text-sm font-medium text-gray-700">Public cible</label>
                <input type="text" id="filter_audience" name="filter_audience"
                       value="<?= isset($_GET['filter_audience']) ? htmlspecialchars($_GET['filter_audience']) : ''; ?>"
                       placeholder="Public cible"
                       class="mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Durée -->
            <div>
                <label for="filter_duration" class="block text-sm font-medium text-gray-700">Durée</label>
                <input type="text" id="filter_duration" name="filter_duration"
                       value="<?= isset($_GET['filter_duration']) ? htmlspecialchars($_GET['filter_duration']) : ''; ?>"
                       placeholder="Durée"
                       class="mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Test inclus -->
            <div>
                <label for="filter_testIncluded" class="block text-sm font-medium text-gray-700">Test inclus</label>
                <input type="text" id="filter_testIncluded" name="filter_testIncluded"
                       value="<?= isset($_GET['filter_testIncluded']) ? htmlspecialchars($_GET['filter_testIncluded']) : ''; ?>"
                       placeholder="Oui / Non"
                       class="mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Contenu du test -->
            <div>
                <label for="filter_testContent" class="block text-sm font-medium text-gray-700">Contenu du test</label>
                <input type="text" id="filter_testContent" name="filter_testContent"
                       value="<?= isset($_GET['filter_testContent']) ? htmlspecialchars($_GET['filter_testContent']) : ''; ?>"
                       placeholder="Contenu du test"
                       class="mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Sujet -->
            <div>
                <label for="filter_subject" class="block text-sm font-medium text-gray-700">Sujet</label>
                <input type="text" id="filter_subject" name="filter_subject"
                       value="<?= isset($_GET['filter_subject']) ? htmlspecialchars($_GET['filter_subject']) : ''; ?>"
                       placeholder="Nom du sujet"
                       class="mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Boutons -->
            <div class="md:col-span-2 lg:col-span-3 flex justify-end items-end space-x-4 mt-2">
                <button type="submit"
                        class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
                    Filtrer
                </button>
                <a href="/admin/courses"
                   class="bg-gray-300 text-gray-700 py-2 px-6 rounded-lg hover:bg-gray-400 transition duration-300">
                    Effacer les filtres
                </a>
            </div>
        </form>
    </div>

    <div class="text-right mb-4">
        <a href="/admin/courses/create" class="inline-block bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition shadow">+  Ajouter un cours</a>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Nom</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Contenu</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Description</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Public cible</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Durée</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Test inclus</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Contenu du test</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Logo</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Sujet</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            <?php foreach ($courses as $course): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['id']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['name']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['content']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['description']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['audience']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['duration']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['testIncluded']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['testContent']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800">
                        <?php if (!empty($course['logo'])): ?>
                            <img src="<?= htmlspecialchars($course['logo'])?>" alt="Logo" class="h-10">
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['subject_name'] ?? '') ?></td>
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
