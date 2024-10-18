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
                <img src="{{ asset($user->foto) }}" alt="foto-profile" class="w-40 h-42 mb-4 rounded-full">
                <p class="text-gray-700 bg-red-300 font-semibold text-center rounded-lg mb-3 p-1">Nama: {{ $user->nama }}</p>
                <p class="text-gray-700 bg-red-300 font-semibold text-center rounded-lg mb-3 p-1">NPM: {{ $user->npm }}</p>
                <p class="text-gray-700 bg-red-300 font-semibold text-center rounded-lg mb-3 p-1">Kelas: {{ $user->nama_kelas ?? 'Kelas tidak ditemukan' }}</p>
                <br> 
                <button class="bg-red-300 flex w-1/3 font-semibold text-gray-700 text-center rounded-lg"><a href="/user" class="w-full">< Back</a></button>
            </div>
        </div>
    </div>
</body>
</html>