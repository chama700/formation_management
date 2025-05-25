<div class="max-w-3xl mx-auto p-8 rounded-lg">

    <h1 class="text-3xl font-bold mb-8 text-[#005a9c] text-center">Ajouter une matière</h1>

    <form action="/admin/subjects/store" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-xl shadow-md">

        <div>
            <label class="block mb-2 font-semibold text-[#222222]">Nom :</label>
            <input
                    type="text"
                    name="name"
                    class="w-full border border-[#222222] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#F16522]"
                    required
            >
        </div>

        <div>
            <label class="block mb-2 font-semibold text-[#222222]">Description courte :</label>
            <input
                    type="text"
                    name="shortDescription"
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
            ></textarea>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-[#222222]">Bénéfice individuel :</label>
            <textarea
                    name="individualBenefit"
                    rows="3"
                    class="w-full border border-[#222222] rounded-lg px-4 py-3 resize-y focus:outline-none focus:ring-2 focus:ring-[#F16522]"
                    required
            ></textarea>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-[#222222]">Bénéfice entreprise :</label>
            <textarea
                    name="businessBenefit"
                    rows="3"
                    class="w-full border border-[#222222] rounded-lg px-4 py-3 resize-y focus:outline-none focus:ring-2 focus:ring-[#F16522]"
                    required
            ></textarea>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-[#222222]">Logo :</label>
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
                    <option value="<?php echo $domain['id']; ?>"><?php echo htmlspecialchars($domain['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="flex items-center space-x-6">
            <button
                    type="submit"
                    class="bg-[#F16522] text-white font-semibold px-6 py-3 rounded-lg hover:bg-[#b34a19] transition duration-300"
            >
                Enregistrer
            </button>
            <a
                    href="/admin/subjects"
                    class="text-gray-600 hover:underline font-semibold"
            >
                Annuler
            </a>
        </div>

    </form>

</div>
