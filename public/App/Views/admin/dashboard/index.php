<?php $title = "Dashboard"; ?>

<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Welcome to the Dashboard</h1>
    <p class="text-gray-600 mt-2">Manage your training entities from this admin panel.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold text-gray-700">🌍 Countries</h2>
        <p class="text-gray-500 mt-2">Add, edit, or delete available countries.</p>
        <a href="/admin/country" class="inline-block mt-4 text-blue-600 hover:underline">Manage</a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold text-gray-700">🏙️ Cities</h2>
        <p class="text-gray-500 mt-2">Manage cities by country.</p>
        <a href="/admin/city" class="inline-block mt-4 text-blue-600 hover:underline">Manage</a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold text-gray-700">👨‍🏫 Trainers</h2>
        <p class="text-gray-500 mt-2">Add and edit available trainers.</p>
        <a href="/admin/trainer" class="inline-block mt-4 text-blue-600 hover:underline">Manage</a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold text-gray-700">📚 Disciplines</h2>
        <p class="text-gray-500 mt-2">Manage training fields.</p>
        <a href="/admin/discipline" class="inline-block mt-4 text-blue-600 hover:underline">Manage</a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold text-gray-700">📖 Subjects</h2>
        <p class="text-gray-500 mt-2">Add subjects related to disciplines.</p>
        <a href="/admin/subject" class="inline-block mt-4 text-blue-600 hover:underline">Manage</a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold text-gray-700">📆 Trainings</h2>
        <p class="text-gray-500 mt-2">Schedule and manage trainings.</p>
        <a href="/admin/formation" class="inline-block mt-4 text-blue-600 hover:underline">Manage</a>
    </div>
</div>

<div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Pie chart -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Entities Distribution</h3>
        <canvas id="pieChart"></canvas>
    </div>

    <!-- Bar chart -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Number of Entities</h3>
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
                label: 'Distribution',
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
                label: 'Number of Entities',
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
