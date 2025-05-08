<?php $title = "Tableau de bord"; ?>

<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Bienvenue dans le tableau de bord </h1>
    <p class="text-gray-600 mt-2">Gérez vos entités de formation à partir de ce panneau d'administration.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold text-gray-700">🌍 Pays</h2>
        <p class="text-gray-500 mt-2">Ajoutez, modifiez ou supprimez les pays disponibles.</p>
        <a href="/admin/country" class="inline-block mt-4 text-blue-600 hover:underline">Gérer</a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold text-gray-700">🏙️ Villes</h2>
        <p class="text-gray-500 mt-2">Gérez les villes par pays.</p>
        <a href="/admin/city" class="inline-block mt-4 text-blue-600 hover:underline">Gérer</a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold text-gray-700">👨‍🏫 Formateurs</h2>
        <p class="text-gray-500 mt-2">Ajoutez et modifiez les formateurs disponibles.</p>
        <a href="/admin/trainer" class="inline-block mt-4 text-blue-600 hover:underline">Gérer</a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold text-gray-700">📚 Disciplines</h2>
        <p class="text-gray-500 mt-2">Gérez les domaines de formation.</p>
        <a href="/admin/discipline" class="inline-block mt-4 text-blue-600 hover:underline">Gérer</a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold text-gray-700">📖 Sujets</h2>
        <p class="text-gray-500 mt-2">Ajoutez les sujets liés aux disciplines.</p>
        <a href="/admin/subject" class="inline-block mt-4 text-blue-600 hover:underline">Gérer</a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold text-gray-700">📆 Formations</h2>
        <p class="text-gray-500 mt-2">Programmez et gérez les formations.</p>
        <a href="/admin/formation" class="inline-block mt-4 text-blue-600 hover:underline">Gérer</a>
    </div>
</div>
<div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Diagramme circulaire -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Répartition des entités</h3>
        <canvas id="pieChart"></canvas>
    </div>

    <!-- Graphique en barres -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Nombre d'entités</h3>
        <canvas id="barChart"></canvas>
    </div>
</div>

<script>
    const dataFromPHP = <?= json_encode($entityCounts) ?>;

    // Pie chart
    const ctx = document.getElementById('pieChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: Object.keys(dataFromPHP),
            datasets: [{
                label: 'Répartition',
                data: Object.values(dataFromPHP),
                backgroundColor: [
                    '#1E3A8A', '#2563EB', '#3B82F6', '#60A5FA', '#93C5FD', '#BFDBFE'
                ]
            }]
        }
    });

    // Bar chart
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: Object.keys(dataFromPHP),
            datasets: [{
                label: 'Nombre d\'entités',
                data: Object.values(dataFromPHP),
                backgroundColor: '#3B82F6'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
