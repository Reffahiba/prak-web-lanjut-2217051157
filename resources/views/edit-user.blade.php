@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="bg-blue-200 rounded-xl shadow-lg p-7">
            <h1 class="font-bold text-center pb-5">Edit User</h1>
            <form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
                @csrf
                @method('PUT')
                <div class="flex flex-col">
                    <label for="foto" class="pb-1 font-bold">Foto:</label>
                    <input type="file" name="foto" class="form-control">
                    @if($user->foto)
                    <img src="{{ asset($user->foto) }}" alt="User foto" class="w-40 h-42 mb-4 rounded-full">
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="nama" class="pb-1 font-bold">Nama:</label>
                    <input type="text" name="nama" id="nama" class="rounded-lg py-1 px-2" value="{{ old('nama', $user->nama) }}">
                </div>
                <br>
                <div class="flex flex-col">
                    <label for="npm" class="pb-1 font-bold">NPM:</label>
                    <input type="text" name="npm" id="npm" class="rounded-lg py-1 px-2" value="{{ old('npm', $user->npm) }}">
                </div>
                <br>
                <div class="flex flex-col">
                    <label for="id_kelas" class="pb-1 font-bold">Kelas:</label>
                    <select name="kelas_id" id="kelas_id" required>
                        @foreach ($kelas as $kelasItem )
                        <option value="{{ $kelasItem->id }}">
                            {{ $kelasItem->id == $user->kelas_id ? 'selected' : ''}}
                            {{ $kelasItem->nama_kelas }}
                        </option>
                        @endforeach      
                    </select>
                </div>
                <br>
                
                <button type="submit" class="rounded-lg bg-green-400 px-2 py-1 font-bold">Submit</button>
            </form>
        </div>
    </div>
@endsection