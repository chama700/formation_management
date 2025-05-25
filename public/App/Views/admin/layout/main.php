<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Admin | <?= $title ?? 'Tableau de bord' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            color: var(--moodle-gray-dark);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg flex flex-col">

        <div class="flex items-center justify-center h-16 border-b border-gray-200">
            <img src="../../../../images/Moodlelogo.svg" alt="Logo" class="h-8 mr-2" />
        </div>

        <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1 bg-gray-50">

            <a href="/admin" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-orange-500 hover:text-white transition">
                <!-- Home icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0H7m6 0v6m-6-6v6a2 2 0 002 2h6a2 2 0 002-2v-6" />
                </svg>
                Tableau de bord
            </a>

            <a href="/admin/country" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-orange-500 hover:text-white transition">
                <!-- Globe icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 12v8m0-8c-4.418 0-8 3.582-8 8h16c0-4.418-3.582-8-8-8z" />
                </svg>
                Pays
            </a>

            <a href="/admin/city" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-orange-500 hover:text-white transition">
                <!-- City icon (building) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 21v-4a1 1 0 011-1h3v5h4v-7h4v7h4v-9a1 1 0 011-1h1" />
                </svg>
                Villes
            </a>

            <a href="/admin/trainers" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-orange-500 hover:text-white transition">
                <!-- User teacher icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 21h8" />
                </svg>
                Formateurs
            </a>

            <a href="/admin/subjects" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-orange-500 hover:text-white transition">
                <!-- Book icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-4-6h8" />
                </svg>
                Sujets
            </a>

            <a href="/admin/courses" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-orange-500 hover:text-white transition">
                <!-- Graduation cap icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 19v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2" />
                </svg>
                Cours
            </a>

            <a href="/admin/formations" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-orange-500 hover:text-white transition">
                <!-- Calendar icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
                Formations
            </a>

            <a href="/admin/domaines" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-orange-500 hover:text-white transition">
                <!-- Folder icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2H9l-2-3H5a2 2 0 00-2 2z" />
                </svg>
                Domaines
            </a>

        </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-8">
        <?= $content ?>
    </main>

</div>
</body>
</html>
