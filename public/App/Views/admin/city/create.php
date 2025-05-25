<!-- Create City Form -->
<style>
    :root {
        --moodle-blue: #005a9c;
        --moodle-light-blue: #0078d4;
        --moodle-orange: #f58220;
        --moodle-gray-light: #f3f6f8;
        --moodle-gray-dark: #4a4a4a;
    }
    body {
        background-color: var(--moodle-gray-light);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
</style>
<div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-8 mt-12 font-sans">

    <h2 class="text-2xl font-bold mb-6 text-[var(--moodle-blue)] text-center">
        Ajouter une Ville
    </h2>

    <form action="/admin/city/store" method="POST" class="space-y-6">

        <div>
            <label for="name" class="block font-semibold mb-2 text-gray-700">Nom de la ville :</label>
            <input
                    type="text"
                    id="name"
                    name="name"
                    required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[var(--moodle-light-blue)]"
            />
        </div>

        <div>
            <label for="country_id" class="block font-semibold mb-2 text-gray-700">Pays :</label>
            <select
                    id="country_id"
                    name="country_id"
                    required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[var(--moodle-light-blue)]"
            >
                <option value="" disabled selected>-- Sélectionner un pays --</option>

                <?php foreach ($countries as $country): ?>
                    <option value="<?= $country['id'] ?>"><?= htmlspecialchars($country['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="inline-block bg-[var(--moodle-blue)] hover:bg-[var(--moodle-light-blue)] text-white font-semibold px-6 py-3 rounded-md shadow-lg transition">
                Enregistrer
            </button>
        </div>

    </form>
</div>
