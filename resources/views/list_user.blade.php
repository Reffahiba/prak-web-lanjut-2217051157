@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-screen">
    <div class="overflow-x-auto flex flex-col justify-center items-center bg-blue-200 rounded-xl shadow-lg py-6 px-3">
        <table class="min-w-full table-auto border-collapse border border-black"> 
            <thead>
                <tr class="bg-gray-300">
                    <th class="border border-black px-3 py-2 text-left">ID</th>
                    <th class="border border-black px-3 py-2 text-left">Nama</th>
                    <th class="border border-black px-3 py-2 text-left">NPM</th>
                    <th class="border border-black px-3 py-2 text-left">Kelas</th>
                    <th class="border border-black px-3 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) {
                ?>
                    <tr class="hover:bg-gray-100 bg-white">
                        <td class="border border-black px-3 py-2 text-left"><?= $user['id']?></td>
                        <td class="border border-black px-3 py-2 text-left"><?= $user['nama']?></td>
                        <td class="border border-black px-3 py-2 text-left"><?= $user['npm']?></td>
                        <td class="border border-black px-3 py-2 text-left"><?= $user['nama_kelas']?></td>
                        <td class="border border-black px-3 py-2 text-left"></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <button class="bg-green-300 font-bold text-center rounded-lg mt-5 py-1 px-2"><a href="{{ route('user.create') }}">Tambah Pengguna Baru</a></button>
    </div>
</div>
    
@endsection