<div class="p-8">
    <header class="mb-10">
        <h1 class="text-5xl font-extrabold text-center text-var(--moodle-blue)">Gestion des cours</h1>
        <p class="text-center mt-2 text-lg text-var(--moodle-gray-dark)">Tableau de bord pour gérer vos cours enregistrés</p>
    </header>
    <div class="container mx-auto px-4 py-10">
        <!-- Filter form -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-10 border border-[#EEEEEE]">
            <form action="/admin/courses" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Each input field -->
                <div>
                    <label for="filter_id" class="text-sm font-semibold text-[#222222] block mb-1">ID</label>
                    <input type="text" id="filter_id" name="filter_id" value="<?= isset($_GET['filter_id']) ? htmlspecialchars($_GET['filter_id']) : ''; ?>" placeholder="ID du cours" class="w-full px-4 py-2 rounded-lg border border-[#CCCCCC] focus:outline-none focus:ring-2 focus:ring-[#0055CC]">
                </div>

                <div>
                    <label for="filter_name" class="text-sm font-semibold text-[#222222] block mb-1">Nom</label>
                    <input type="text" id="filter_name" name="filter_name" value="<?= isset($_GET['filter_name']) ? htmlspecialchars($_GET['filter_name']) : ''; ?>" placeholder="Nom du cours" class="w-full px-4 py-2 rounded-lg border border-[#CCCCCC] focus:outline-none focus:ring-2 focus:ring-[#0055CC]">
                </div>

                <div>
                    <label for="filter_content" class="text-sm font-semibold text-[#222222] block mb-1">Contenu</label>
                    <input type="text" id="filter_content" name="filter_content" value="<?= isset($_GET['filter_content']) ? htmlspecialchars($_GET['filter_content']) : ''; ?>" placeholder="Contenu" class="w-full px-4 py-2 rounded-lg border border-[#CCCCCC] focus:outline-none focus:ring-2 focus:ring-[#0055CC]">
                </div>

                <div>
                    <label for="filter_description" class="text-sm font-semibold text-[#222222] block mb-1">Description</label>
                    <input type="text" id="filter_description" name="filter_description" value="<?= isset($_GET['filter_description']) ? htmlspecialchars($_GET['filter_description']) : ''; ?>" placeholder="Description" class="w-full px-4 py-2 rounded-lg border border-[#CCCCCC] focus:outline-none focus:ring-2 focus:ring-[#0055CC]">
                </div>

                <div>
                    <label for="filter_audience" class="text-sm font-semibold text-[#222222] block mb-1">Public cible</label>
                    <input type="text" id="filter_audience" name="filter_audience" value="<?= isset($_GET['filter_audience']) ? htmlspecialchars($_GET['filter_audience']) : ''; ?>" placeholder="Public cible" class="w-full px-4 py-2 rounded-lg border border-[#CCCCCC] focus:outline-none focus:ring-2 focus:ring-[#0055CC]">
                </div>

                <div>
                    <label for="filter_duration" class="text-sm font-semibold text-[#222222] block mb-1">Durée</label>
                    <input type="text" id="filter_duration" name="filter_duration" value="<?= isset($_GET['filter_duration']) ? htmlspecialchars($_GET['filter_duration']) : ''; ?>" placeholder="Durée" class="w-full px-4 py-2 rounded-lg border border-[#CCCCCC] focus:outline-none focus:ring-2 focus:ring-[#0055CC]">
                </div>

                <div>
                    <label for="filter_testIncluded" class="text-sm font-semibold text-[#222222] block mb-1">Test inclus</label>
                    <input type="text" id="filter_testIncluded" name="filter_testIncluded" value="<?= isset($_GET['filter_testIncluded']) ? htmlspecialchars($_GET['filter_testIncluded']) : ''; ?>" placeholder="Oui / Non" class="w-full px-4 py-2 rounded-lg border border-[#CCCCCC] focus:outline-none focus:ring-2 focus:ring-[#0055CC]">
                </div>

                <div>
                    <label for="filter_testContent" class="text-sm font-semibold text-[#222222] block mb-1">Contenu du test</label>
                    <input type="text" id="filter_testContent" name="filter_testContent" value="<?= isset($_GET['filter_testContent']) ? htmlspecialchars($_GET['filter_testContent']) : ''; ?>" placeholder="Contenu du test" class="w-full px-4 py-2 rounded-lg border border-[#CCCCCC] focus:outline-none focus:ring-2 focus:ring-[#0055CC]">
                </div>

                <div>
                    <label for="filter_subject" class="text-sm font-semibold text-[#222222] block mb-1">Sujet</label>
                    <input type="text" id="filter_subject" name="filter_subject" value="<?= isset($_GET['filter_subject']) ? htmlspecialchars($_GET['filter_subject']) : ''; ?>" placeholder="Nom du sujet" class="w-full px-4 py-2 rounded-lg border border-[#CCCCCC] focus:outline-none focus:ring-2 focus:ring-[#0055CC]">
                </div>

                <!-- Buttons -->
                <div class="col-span-full flex justify-end space-x-4 mt-2">
                    <button type="submit" class="bg-[#0055CC] text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-700 transition">Filtrer</button>
                    <a href="/admin/courses" class="bg-[#EEEEEE] text-[#222222] font-semibold px-6 py-2 rounded-lg hover:bg-gray-300 transition">Effacer</a>
                </div>
            </form>
        </div>

        <!-- Add course button -->
        <div class="text-right mb-6">
            <a href="/admin/courses/create" class="inline-block bg-[#F16522] text-white px-6 py-2 rounded-xl font-semibold shadow hover:bg-orange-600 transition">+ Ajouter un cours</a>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow overflow-x-auto border border-[#EEEEEE]">
            <table class="min-w-full divide-y divide-[#EEEEEE] text-sm">
                <thead class="bg-[#F9FAFB] text-[#222222] font-semibold">
                <tr>
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Nom</th>
                    <th class="px-6 py-3 text-left">Contenu</th>
                    <th class="px-6 py-3 text-left">Description</th>
                    <th class="px-6 py-3 text-left">Public cible</th>
                    <th class="px-6 py-3 text-left">Durée</th>
                    <th class="px-6 py-3 text-left">Test inclus</th>
                    <th class="px-6 py-3 text-left">Contenu du test</th>
                    <th class="px-6 py-3 text-left">Logo</th>
                    <th class="px-6 py-3 text-left">Sujet</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-[#EEEEEE]">
                <?php foreach ($courses as $course): ?>
                    <tr class="hover:bg-[#FAFAFA]">
                        <td class="px-6 py-4"><?= htmlspecialchars($course['id']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($course['name']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($course['content']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($course['description']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($course['audience']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($course['duration']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($course['testIncluded']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($course['testContent']) ?></td>
                        <td class="px-6 py-4">
                            <?php if (!empty($course['logo'])): ?>
                                <img src="<?= htmlspecialchars($course['logo']) ?>" alt="Logo" class="h-10 rounded">
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4"><?= htmlspecialchars($course['subject_name'] ?? '') ?></td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="/admin/courses/edit/<?= $course['id'] ?>" class="text-[#0055CC] hover:underline font-medium">Modifier</a>
                            <span class="text-gray-300">|</span>
                            <a href="/admin/courses/delete/<?= $course['id'] ?>" onclick="return confirm('Supprimer ce cours ?')" class="text-red-500 hover:underline font-medium">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>