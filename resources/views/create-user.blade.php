<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Create User</title>
</head>
<body class="bg-gradient-to-t from-blue-100 to-blue-300 flex justify-center items-center h-full">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-blue-200 rounded-xl shadow-lg p-7">
            <h1 class="font-bold text-center pb-5">Create User</h1>
            <form action="{{ route('user.store') }}" method="POST" class="flex flex-col items-center">
                @csrf
                <div class="flex flex-col">
                    <label for="nama" class="pb-1 font-bold">Nama:</label>
                    <input type="text" name="nama" id="nama" class="rounded-lg py-1 px-2">
                    @foreach ($errors->get('nama') as $msg )
                        <p class="text-red-600">{{ $msg }}</p>
                    @endforeach
                </div>
                <br>
                <div class="flex flex-col">
                    <label for="npm" class="pb-1 font-bold">NPM:</label>
                    <input type="text" name="npm" id="npm" class="rounded-lg py-1 px-2">
                    @foreach ($errors->get('nama') as $msg )
                        <p class="text-red-600">{{ $msg }}</p>
                    @endforeach
                </div>
                <br>
                <div class="flex flex-col">
                    <label for="id_kelas" class="pb-1 font-bold">Kelas:</label>
                    <select name="kelas_id" id="kelas_id" required>
                        @foreach ($kelas as $kelasItem )
                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                        @endforeach      
                    </select>
                </div>
                <br>
                
                <button type="submit" class="rounded-lg bg-green-400 px-2 py-1 font-bold">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>