<?php $title = "Tableau de bord"; ?>

<div class="mb-6">
    <h1 class="text-3xl font-bold text-[#222222]">Bienvenue dans votre tableau de bord</h1>
    <p class="text-[#555555] mt-2">Gérez facilement toutes vos entités de formation depuis un seul endroit.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php
    $cards = [
        ['title' => 'Pays', 'desc' => 'Configurez et administrez les pays disponibles.', 'link' => '/admin/country'],
        ['title' => 'Villes', 'desc' => 'Attribuez et gérez les villes associées à chaque pays.', 'link' => '/admin/city'],
        ['title' => 'Formateurs', 'desc' => 'Ajoutez, modifiez ou supprimez les formateurs enregistrés.', 'link' => '/admin/trainers'],
        ['title' => 'Sujets', 'desc' => 'Organisez les sujets par domaine de formation.', 'link' => '/admin/subjects'],
        ['title' => 'Formations', 'desc' => 'Planifiez et suivez vos sessions de formation.', 'link' => '/admin/formations'],
        ['title' => 'Domaines', 'desc' => 'Définissez les domaines de spécialisation et leurs caractéristiques.', 'link' => '/admin/domaines'],
    ];

    foreach ($cards as $card): ?>
        <div class="bg-[#EEEEEE] p-6 rounded-lg shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold text-[#222222]"><?= $card['title'] ?></h2>
            <p class="text-[#555555] mt-2"><?= $card['desc'] ?></p>
            <a href="<?= $card['link'] ?>" class="inline-block mt-4 text-[#F16522] hover:underline font-semibold">Accéder</a>
        </div>
    <?php endforeach; ?>
</div>

<div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Polar Area Chart -->
    <div class="bg-[#EEEEEE] p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-[#222222] mb-4">Répartition des entités</h3>
        <canvas id="polarAreaChart"></canvas>
        <div id="polarAreaLegend" class="mt-4"></div>
    </div>

    <!-- Horizontal Stacked Bar Chart -->
    <div class="bg-[#EEEEEE] p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-[#222222] mb-4">Nombre total d'entités</h3>
        <canvas id="horizontalBarChart"></canvas>
    </div>
</div>

<script>
    const dataFromPHP = <?= json_encode($entityCounts) ?>;

    // Polar Area Chart with custom legend
    const polarCtx = document.getElementById('polarAreaChart').getContext('2d');
    const polarAreaChart = new Chart(polarCtx, {
        type: 'polarArea',
        data: {
            labels: Object.keys(dataFromPHP),
            datasets: [{
                label: 'Répartition',
                data: Object.values(dataFromPHP),
                backgroundColor: [
                    '#F16522', '#0055CC', '#008B8B', '#FDBA74', '#FECACA', '#93C5FD'
                ],
                borderWidth: 2,
                borderColor: '#EEEEEE',
                hoverOffset: 40
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
                    enabled: true,
                    backgroundColor: '#222222',
                    titleColor: '#F16522',
                    bodyColor: '#EEEEEE',
                }
            },
            scales: {
                r: {
                    ticks: { color: '#222222', font: { weight: '600' } },
                    grid: { color: '#cccccc' }
                }
            }
        },
    });

    // Custom legend generator for polar area chart
    function generatePolarLegend(chart, elementId) {
        const legendContainer = document.getElementById(elementId);
        const labels = chart.data.labels;
        const colors = chart.data.datasets[0].backgroundColor;
        legendContainer.innerHTML = labels.map((label, i) => `
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:6px;">
                <span style="width:20px;height:20px;background-color:${colors[i]};border-radius:50%;display:inline-block;"></span>
                <span style="color:#222222;font-weight:600;">${label}</span>
            </div>
        `).join('');
    }
    generatePolarLegend(polarAreaChart, 'polarAreaLegend');

    // Horizontal stacked bar chart
    const horizontalBarCtx = document.getElementById('horizontalBarChart').getContext('2d');
    new Chart(horizontalBarCtx, {
        type: 'bar',
        data: {
            labels: Object.keys(dataFromPHP),
            datasets: [{
                label: "Nombre d'entités",
                data: Object.values(dataFromPHP),
                backgroundColor: '#F16522',
                borderRadius: 5,
                barPercentage: 0.7,
                categoryPercentage: 0.7,
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            interaction: {
                mode: 'nearest',
                intersect: false
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    enabled: true,
                    backgroundColor: '#222222',
                    titleColor: '#F16522',
                    bodyColor: '#EEEEEE',
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    grid: { color: '#cccccc' },
                    ticks: { color: '#222222', font: { weight: '600' } }
                },
                y: {
                    grid: { display: false },
                    ticks: { color: '#222222', font: { weight: '600' } }
                }
            }
        }
    });
</script>
