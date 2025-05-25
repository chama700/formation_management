<!-- views/admin/formations/create.php -->
<div class="admin-form-container max-w-4xl mx-auto rounded-lg p-8 mt-12 font-sans">
    <h1 class="text-3xl font-bold mb-8 text-[#005a9c] text-center">Créer une formation</h1>

    <form action="/admin/formations/store" method="post" enctype="multipart/form-data" class="bg-[#F0F0F0] p-8 rounded-2xl shadow-lg space-y-6 max-w-4xl">
        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Prix *</label>
            <input name="price" type="number" step="0.01" placeholder="Prix" required
                   class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]">
        </div>

        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Mode *</label>
            <select name="mode" required
                    class="w-full border border-[#ccc] rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#F98012]">
                <option value="présentiel">Présentiel</option>
                <option value="distanciel">Distanciel</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Cours associé *</label>
            <select name="course_id" required
                    class="w-full border border-[#ccc] rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#F98012]">
                <option value="">Choisir un cours</option>
                <?php foreach ($courses as $course): ?>
                    <option value="<?= $course['id'] ?>"><?= htmlspecialchars($course['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Ville *</label>
            <select name="city_id" required
                    class="w-full border border-[#ccc] rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#F98012]">
                <option value="">Choisir une ville</option>
                <?php foreach ($cities as $city): ?>
                    <option value="<?= $city['id'] ?>"><?= htmlspecialchars($city['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Formateur *</label>
            <select name="trainer_id" required
                    class="w-full border border-[#ccc] rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#F98012]">
                <option value="">Choisir un formateur</option>
                <?php foreach ($trainers as $trainer): ?>
                    <option value="<?= $trainer['id'] ?>"><?= htmlspecialchars($trainer['firstName']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Dates de la formation</label>
            <div class="space-y-2">
                <input type="date" name="dates[]" class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]">
                <input type="date" name="dates[]" class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]">
                <input type="date" name="dates[]" class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]">
            </div>
        </div>

        <div class="text-right pt-4">
            <button type="submit"
                    class="bg-[#F98012] text-white font-semibold px-6 py-2 rounded-lg hover:bg-[#e26f05] transition duration-300">
                Créer
            </button>
            <a href="/admin/formations" class="ml-4 text-sm text-[#005a9c] hover:underline">Annuler</a>
        </div>
    </form>
</div>
