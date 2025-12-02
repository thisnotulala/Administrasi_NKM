<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white shadow min-h-screen p-6">
        <h2 class="text-lg font-bold mb-5">MENU</h2>

        <ul class="space-y-4">
            <li><a href="/dashboard" class="block">Dashboard</a></li>
            <li><a href="/proyek" class="block">Kelola Proyek</a></li>
            <li><a href="/material" class="block">Material</a></li>
            <li><a href="/equipment" class="block">Equipment</a></li>
            <li><a href="/pengeluaran" class="block">Pengeluaran</a></li>
            <li><a href="/laporan" class="block">Laporan</a></li>
        </ul>

        <form class="mt-10" method="POST" action="/logout">
            @csrf
            <button class="bg-red-500 text-white w-full py-2 rounded">Logout</button>
        </form>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-10">
        @yield('content')
    </main>

</body>
</html>
