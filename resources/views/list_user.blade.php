@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="overflow-x-auto flex flex-col justify-center items-center bg-blue-200 rounded-xl shadow-lg py-6 px-3">
                <div class="flex flex-row space-x-4">
                    <?php foreach ($users as $user){?>
                            <div class="flex justify-center items-center h-full">
                                <div class="bg-gray-100 shadow-lg rounded-3xl p-4 flex flex-col">
                                    <img src="{{ asset($user->foto) }}" alt="foto-profile" class="w-40 h-42 mb-4 rounded-full">
                                    <p class="text-gray-700 bg-red-300 font-semibold text-center rounded-lg mb-3 p-1">Nama: {{ $user->nama }}</p>
                                    <p class="text-gray-700 bg-red-300 font-semibold text-center rounded-lg mb-3 p-1">NPM: {{ $user->npm }}</p>
                                    <p class="text-gray-700 bg-red-300 font-semibold text-center rounded-lg mb-3 p-1">Kelas: {{ $user->nama_kelas ?? 'Kelas tidak ditemukan' }}</p>
                                    <p class="text-gray-700 bg-red-300 font-semibold text-center rounded-lg mb-3 p-1">Jurusan: {{ $user->jurusan }}</p>
                                    <p class="text-gray-700 bg-red-300 font-semibold text-center rounded-lg mb-3 p-1">Semester: {{ $user->semester }}</p>
                                    <a href="{{ route('user.show', $user->id) }}" class="bg-green-400 p-1 text-md-center w-1/2 font-semibold mx-1 rounded-lg">Detail</a>
                                    <a href="{{ route('user.edit', $user->id) }}" class="bg-yellow-400 p-1 text-md-center w-1/2 font-semibold mx-1 rounded-lg">Edit</a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-400 p-1 text-md-center font-semibold mx-1 rounded-lg" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                    <?php } ?>
                </div>

                <button class="bg-green-300 font-bold text-center rounded-lg mt-5 py-1 px-2"><a href="{{ route('user.create') }}">Tambah Pengguna Baru</a></button>
        </div>
    </div>
@endsection