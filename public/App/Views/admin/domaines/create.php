<!-- views/admin/domaines/create.php -->
<div class="admin-form-container max-w-4xl mx-auto rounded-lg p-8 mt-12 font-sans">
    <h1 class="text-3xl font-bold mb-8 text-[#005a9c] text-center">Ajouter un domaine</h1>

    <form action="/admin/domaines/store" method="post" enctype="multipart/form-data"
          class="bg-[#F0F0F0] p-8 rounded-2xl shadow-lg space-y-6 max-w-4xl">

        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Nom du domaine *</label>
            <input name="name" type="text" placeholder="Nom du domaine" required
                   class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]">
        </div>

        <div>
            <label class="block text-sm font-semibold text-[#002B45] mb-1">Description *</label>
            <textarea name="description" rows="3" placeholder="Description du domaine" required
                      class="w-full border border-[#ccc] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#F98012]"></textarea>
        </div>

        <div class="text-right pt-4">
            <button type="submit"
                    class="bg-[#F98012] text-white font-semibold px-6 py-2 rounded-lg hover:bg-[#e26f05] transition duration-300">
                Ajouter
            </button>
            <a href="/admin/domaines" class="ml-4 text-sm text-[#005a9c] hover:underline">Annuler</a>
        </div>
    </form>
</div>
