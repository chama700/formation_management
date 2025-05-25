<?php
// Safe initialization with defaults
$name = htmlspecialchars($subject['name'] ?? '');
$shortDescription = htmlspecialchars($subject['shortDescription'] ?? '');
$longDescription = htmlspecialchars($subject['longDescription'] ?? '');
$individualBenefit = htmlspecialchars($subject['individualBenefit'] ?? '');
$businessBenefit = htmlspecialchars($subject['businessBenefit'] ?? '');
$logo = $subject['logo'] ?? '';
$domainId = $subject['domain_id'] ?? null;
?>

<div class="max-w-3xl mx-auto p-8 rounded-lg">

    <h1 class="text-3xl font-bold mb-8 text-[#005a9c] text-center">Modifier une matière</h1>

    <?php if (!isset($subject)): ?>
        <p class="text-red-600 font-semibold text-center">Erreur : la matière n'a pas été trouvée.</p>
    <?php else: ?>
        <form
                method="POST"
                action="/admin/subjects/update/<?php echo $subject['id']; ?>"
                enctype="multipart/form-data"
                class="space-y-6 bg-white p-6 rounded-xl shadow-md"
        >

            <div>
                <label class="block mb-2 font-semibold text-[#222222]">Nom :</label>
                <input
                        type="text"
                        name="name"
                        value="<?= $name ?>"
                        class="w-full border border-[#222222] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#F16522]"
                        required
                >
            </div>

            <div>
                <label class="block mb-2 font-semibold text-[#222222]">Description courte :</label>
                <input
                        type="text"
                        name="shortDescription"
                        value="<?= $shortDescription ?>"
                        class="w-full border border-[#222222] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#F16522]"
                        required
                >
            </div>

            <div>
                <label class="block mb-2 font-semibold text-[#222222]">Description longue :</label>
                <textarea
                        name="longDescription"
                        rows="4"
                        class="w-full border border-[#222222] rounded-lg px-4 py-3 resize-y focus:outline-none focus:ring-2 focus:ring-[#F16522]"
                        required
                ><?= $longDescription ?></textarea>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-[#222222]">Bénéfice individuel :</label>
                <textarea
                        name="individualBenefit"
                        rows="3"
                        class="w-full border border-[#222222] rounded-lg px-4 py-3 resize-y focus:outline-none focus:ring-2 focus:ring-[#F16522]"
                        required
                ><?= $individualBenefit ?></textarea>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-[#222222]">Bénéfice entreprise :</label>
                <textarea
                        name="businessBenefit"
                        rows="3"
                        class="w-full border border-[#222222] rounded-lg px-4 py-3 resize-y focus:outline-none focus:ring-2 focus:ring-[#F16522]"
                        required
                ><?= $businessBenefit ?></textarea>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-[#222222]">Logo :</label>
                <?php if (!empty($logo)): ?>
                    <img src="<?= $logo ?>" alt="Logo actuel" class="h-12 mb-3 rounded border border-gray-300">
                <?php endif; ?>
                <input
                        type="file"
                        name="logo"
                        class="w-full border border-[#222222] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F16522]"
                >
            </div>

            <div>
                <label class="block mb-2 font-semibold text-[#222222]">Domaine :</label>
                <select
                        name="domain_id"
                        class="w-full border border-[#222222] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#F16522]"
                >
                    <?php foreach ($domaines as $domain): ?>
                        <option value="<?= $domain['id'] ?>" <?= ($domainId == $domain['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($domain['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex items-center space-x-6">
                <button
                        type="submit"
                        class="bg-[#F16522] text-white font-semibold px-6 py-3 rounded-lg hover:bg-[#b34a19] transition duration-300"
                >
                    Mettre à jour
                </button>
                <a
                        href="/admin/subjects"
                        class="text-gray-600 hover:underline font-semibold"
                >
                    Annuler
                </a>
            </div>

        </form>
    <?php endif; ?>
</div>
