<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Profile Reffa</title>
</head>
<body class="bg-gradient-to-t from-red-500 to-pink-500">
    <div class="h-screen">
        <div class="flex justify-center items-center h-full">
            <div class="bg-gray-100 shadow-lg rounded-3xl p-4 flex flex-col">
                <h1 class="text-black text-center mb-6 font-extrabold">About Me</h1>
                <img src="{{ asset('upload/img/' . $user->foto) }}" alt="foto-profile" class="w-44 h-52 mb-4 rounded-full">
                <p class="text-gray-700 bg-red-300 font-semibold text-center rounded-lg mb-3">Nama: {{ $user->nama }}</p>
                <p class="text-gray-700 bg-red-300 font-semibold text-center rounded-lg mb-3">NPM: {{ $user->npm }}</p>
                <p class="text-gray-700 bg-red-300 font-semibold text-center rounded-lg mb-3">Kelas: {{ $user->nama_kelas ?? 'Kelas tidak ditemukan' }}</p>
            </div>
        </div>
    </div>
</body>
</html>