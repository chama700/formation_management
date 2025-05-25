<div class="admin-form-container max-w-4xl mx-auto rounded-lg p-8 mt-12 font-sans">
<h1 class="text-3xl font-bold mb-8 text-[#005a9c] text-center">Modifier un cours</h1>

<form method="POST" action="/admin/courses/update/<?php echo $course['id']; ?>" enctype="multipart/form-data" class="bg-[#F0F0F0] p-8 rounded-2xl shadow-lg space-y-6 max-w-4xl">
    <div>
        <label class="block text-sm font-semibold text-[#002B45] mb-1">Nom du cours *</label>
        <input name="name" value="<?= htmlspecialchars($course['name']) ?>" required class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]">
    </div>

    <div>
        <label class="block text-sm font-semibold text-[#002B45] mb-1">Contenu</label>
        <textarea name="content" rows="4" class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]"><?= htmlspecialchars($course['content']) ?></textarea>
    </div>

    <div>
        <label class="block text-sm font-semibold text-[#002B45] mb-1">Description</label>
        <textarea name="description" rows="4" class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]"><?= htmlspecialchars($course['description']) ?></textarea>
    </div>

    <div>
        <label class="block text-sm font-semibold text-[#002B45] mb-1">Public concerné</label>
        <input name="audience" value="<?= htmlspecialchars($course['audience']) ?>" class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]">
    </div>

    <div>
        <label class="block text-sm font-semibold text-[#002B45] mb-1">Durée</label>
        <input name="duration" value="<?= htmlspecialchars($course['duration']) ?>" class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]">
    </div>

    <div>
        <label class="block text-sm font-semibold text-[#002B45] mb-1">Test inclus</label>
        <input name="testIncluded" value="<?= htmlspecialchars($course['testIncluded']) ?>" class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]">
    </div>

    <div>
        <label class="block text-sm font-semibold text-[#002B45] mb-1">Contenu du test</label>
        <textarea name="testContent" rows="3" class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]"><?= htmlspecialchars($course['testContent']) ?></textarea>
    </div>

    <div>
        <label class="block text-sm font-semibold text-[#002B45] mb-1">Logo actuel</label>
        <img src="<?= htmlspecialchars($course['logo']) ?>" width="100" class="mb-3 rounded-lg shadow-md">
        <input type="file" name="logo" class="block mt-1 text-sm text-[#002B45]">
        <input type="hidden" name="old_logo" value="<?= htmlspecialchars($course['logo']) ?>">
    </div>

    <div>
        <label class="block text-sm font-semibold text-[#002B45] mb-1">Sujet associé *</label>
        <select name="subject_id" required class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012] bg-white">
            <?php foreach ($subjects as $subject): ?>
                <option value="<?= $subject['id'] ?>" <?= $subject['id'] == $course['subject_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($subject['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="text-right">
        <button type="submit" class="bg-[#F98012] text-white font-semibold px-6 py-2 rounded-lg hover:bg-[#e26f05] transition duration-300">
            Mettre à jour
        </button>
    </div>
</form>
</div>