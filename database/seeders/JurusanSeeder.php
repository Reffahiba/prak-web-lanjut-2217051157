<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Ilmu Komputer',
            'Biologi',
            'Fisika',
            'Matematika',
        ];

        foreach ($data as $jurusan){
            User::create([
                'jurusan' => $jurusan,
            ]);
        }
    }
}
