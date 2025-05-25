<main class="p-8">
<header class="mb-8">
    <h1 class="text-5xl font-extrabold text-center text-text-[#0055CC]">
        Liste des matières
    </h1>
    <p class="text-center mt-2 text-lg text-[var(--moodle-gray-dark)]">
        Tableau de bord pour gérer vos matières enregistrées
    </p>
</header>
<div class="flex-grow mx-auto container mx-auto p-8 max-w-7xl">

    <!-- Filter Form -->
    <div class="bg-white p-6 rounded-xl shadow-sm mb-10">
        <form action="/admin/subjects" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
            <div>
                <label for="filter_id" class="block font-semibold text-[#222222] mb-2">Filtrer par ID :</label>
                <input
                        type="text"
                        id="filter_id"
                        name="filter_id"
                        value="<?php echo isset($_GET['filter_id']) ? htmlspecialchars($_GET['filter_id']) : ''; ?>"
                        placeholder="ID de la matière"
                        class="w-full border border-[#222222] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F16522]"
                >
            </div>

            <div>
                <label for="filter_name" class="block font-semibold text-[#222222] mb-2">Filtrer par nom :</label>
                <input
                        type="text"
                        id="filter_name"
                        name="filter_name"
                        value="<?php echo isset($_GET['filter_name']) ? htmlspecialchars($_GET['filter_name']) : ''; ?>"
                        placeholder="Nom de la matière"
                        class="w-full border border-[#222222] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F16522]"
                >
            </div>

            <div class="flex space-x-4">
                <button
                        type="submit"
                        class="bg-[#0055CC] text-white font-semibold px-6 py-3 rounded-lg hover:bg-[#003A99] transition duration-300 w-full"
                >
                    Appliquer
                </button>
                <a
                        href="/admin/subjects"
                        class="bg-[#F16522] text-white font-semibold px-6 py-3 rounded-lg hover:bg-[#b34a19] transition duration-300 w-full text-center"
                >
                    Effacer
                </a>
            </div>
        </form>
    </div>

    <!-- Add Button -->
    <div class="text-right mb-8">
        <a
                href="/admin/subjects/create"
                class="inline-block bg-[#F16522] text-white px-7 py-3 rounded-lg hover:bg-[#b34a19] transition shadow font-semibold"
        >
            + Ajouter une matière
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full table-auto text-[#222222]">
            <thead class="bg-[#EEEEEE] font-semibold text-lg border-b border-[#222222]">
            <tr>
                <th class="py-4 px-6 text-left">ID</th>
                <th class="py-4 px-6 text-left">Nom</th>
                <th class="py-4 px-6 text-left">Description courte</th>
                <th class="py-4 px-6 text-left">Logo</th>
                <th class="py-4 px-6 text-left">Domaine</th>
                <th class="py-4 px-6 text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($subjects)): ?>
                <?php foreach ($subjects as $subject): ?>
                    <tr class="border-b border-[#EEEEEE] hover:bg-[#F16522]/10 transition-colors">
                        <td class="py-3 px-6 align-middle font-medium"><?php echo htmlspecialchars($subject['id']); ?></td>
                        <td class="py-3 px-6 align-middle font-medium"><?php echo htmlspecialchars($subject['name']); ?></td>
                        <td class="py-3 px-6 align-middle text-gray-700"><?php echo htmlspecialchars($subject['shortDescription']); ?></td>
                        <td class="py-3 px-6 align-middle">
                            <?php if ($subject['logo']): ?>
                                <img src="<?php echo $subject['logo']; ?>" alt="logo" class="h-12 w-auto rounded-md shadow-sm object-contain">
                            <?php else: ?>
                                <span class="text-gray-400 italic">Aucun logo</span>
                            <?php endif; ?>
                        </td>
                        <td class="py-3 px-6 align-middle font-semibold"><?php echo htmlspecialchars($subject['domain_name']); ?></td>
                        <td class="py-3 px-6 align-middle space-x-6">
                            <a href="/admin/subjects/edit/<?php echo $subject['id']; ?>" class="text-[#0055CC] hover:underline font-semibold">Modifier</a>
                            <a href="/admin/subjects/delete/<?php echo $subject['id']; ?>"
                               class="text-[#F16522] hover:underline font-semibold"
                               onclick="return confirm('Confirmer la suppression ?')">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center py-8 text-gray-500 italic">Aucune matière trouvée.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</main>