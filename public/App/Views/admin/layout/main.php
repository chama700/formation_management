<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | <?= $title ?? 'Dashboard' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
<div class="flex">

    <!-- Sidebar -->
    <div class="w-64 min-h-screen bg-gray-800 text-white flex flex-col">
        <div class="px-6 py-4 text-xl font-bold border-b border-gray-700">📊 Admin</div>
        <nav class="flex-1 px-4 py-4 space-y-2">
            <a href="/admin" class="block py-2 px-3 rounded hover:bg-gray-700">🏠 Home</a>
            <a href="/admin/country" class="block py-2 px-3 rounded hover:bg-gray-700">🌍 Countries</a>
            <a href="/admin/city" class="block py-2 px-3 rounded hover:bg-gray-700">🏙️ Cities</a>
            <a href="/admin/trainer" class="block py-2 px-3 rounded hover:bg-gray-700">👨‍🏫 Trainers</a>
            <a href="/admin/discipline" class="block py-2 px-3 rounded hover:bg-gray-700">📚 Disciplines</a>
            <a href="/admin/subject" class="block py-2 px-3 rounded hover:bg-gray-700">📖 Subjects</a>
            <a href="/admin/course" class="block py-2 px-3 rounded hover:bg-gray-700">🎓 Courses</a>
            <a href="/admin/formation" class="block py-2 px-3 rounded hover:bg-gray-700">📆 Trainings</a>
        </nav>
    </div>

    <!-- Main content -->
    <div class="flex-1 p-8">
        <?= $content ?>
    </div>
</div>
</body>
</html>
