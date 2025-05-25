<!-- views/admin/courses/create.php -->
<div class="admin-form-container max-w-4xl mx-auto rounded-lg p-8 mt-12 font-sans">
    <h1 class="text-3xl font-bold mb-8 text-[#005a9c] text-center">Créer un cours</h1>

    <form action="/admin/courses/store" method="post" enctype="multipart/form-data" class="bg-[#F0F0F0] p-8 rounded-2xl shadow-lg space-y-6 max-w-4xl">
        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Nom du cours *</label>
            <input name="name" type="text" placeholder="Nom" required
                   class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]">
        </div>

        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Contenu</label>
            <textarea name="content" rows="4" placeholder="Contenu" required
                      class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]"></textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Description</label>
            <textarea name="description" rows="4" placeholder="Description" required
                      class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]"></textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Public concerné</label>
            <input name="audience" type="text" placeholder="Audience" required
                   class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]">
        </div>

        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Durée</label>
            <input name="duration" type="text" placeholder="Durée" required
                   class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]">
        </div>

        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Test inclus</label>
            <input name="testIncluded" type="text" placeholder="Test inclus" required
                   class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]">
        </div>

        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Contenu du test</label>
            <textarea name="testContent" rows="3" placeholder="Contenu du test" required
                      class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]"></textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Logo</label>
            <input type="file" name="logo" class="block mt-1 text-sm text-[#002B45]">
        </div>

        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Sujet associé *</label>
            <select name="subject_id" required
                    class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012] bg-white">
                <option value="">Choisir un sujet</option>
                <?php foreach ($subjects as $subject): ?>
                    <option value="<?= $subject['id'] ?>"><?= htmlspecialchars($subject['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="text-right pt-4">
            <button type="submit"
                    class="bg-[#F98012] text-white font-semibold px-6 py-2 rounded-lg hover:bg-[#e26f05] transition duration-300">
                Créer
            </button>
            <a href="/admin/courses" class="ml-4 text-sm text-[#005a9c] hover:underline">Annuler</a>
        </div>
    </form>
</div>
