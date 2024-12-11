<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\Kelas;   
use Illuminate\Http\Request;

class UserController extends Controller
{

    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index(){
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];  

        return view('list_user', $data);
    }

    public function show($id){
        $user = $this->userModel->getUser($id);
        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];

        return view('profile', $data);
    }

    public function profile($nama = "", $kelas = "", $npm = ""){
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];
        return view('profile', $data);
    }

    public function create(){
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create-user', $data);
    }

    public function edit($id){
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit-user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id){
        $user = UserModel::findOrFail($id);
        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;
        $user->jurusan = $request->jurusan;
        $user->semester = $request->semester;

        if($request->hasFile('foto')){
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('upload/img/'), $fileName);
            $user->foto = 'upload/img/' . $fileName;
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated succesfully');
    }

    public function destroy($id){
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->to('/user')->with('success', 'User has been deleted successfully');
    }

    public function store(Request $request){
        // $validatedData = $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'npm' => 'required|string|max:255',
        //     'kelas_id' => 'required|exists:kelas,id',
        // ]);

        // $user = UserModel::create($validatedData);
        // $user->load('kelas');
        

        // return view('profile', [
        //     'nama' => $user->nama,
        //     'npm' => $user->npm,
        //     'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        // ]);

        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jurusan' => 'required|string|max:255',
            'semester' => 'required|integer',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('uploads', $filename);
        } else {
            $fotoPath = null;
        }

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $filename,
            'jurusan' => $request->input('jurusan'),
            'semester' => $request->input('semester'),
        ]);

        return redirect()->to('/')->with('success', 'User berhasil ditambahkan');
    }
}
