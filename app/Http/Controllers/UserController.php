<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\Kelas;   
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile($nama = "", $kelas = "", $npm = ""){
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];
        return view('profile', $data);
    }

    public function create(){
        return view('create-user', [
            'kelas' => Kelas::all(),
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = UserModel::create($validatedData);
        $user->load('kelas');
        

        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        ]);
    }
}
