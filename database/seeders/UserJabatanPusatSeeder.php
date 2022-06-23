<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserJabatanPusat;

class UserJabatanPusatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserJabatanPusat::create([
            'id' => 1,
            'nama_jabatan' => 'Promotion Processor',
            'keterangan_jabatan' => '',
        ]);
        UserJabatanPusat::create([
            'id' => 2,
            'nama_jabatan' => 'Promotion Supervisor',
            'keterangan_jabatan' => '',
        ]);
        UserJabatanPusat::create([
            'id' => 3,
            'nama_jabatan' => 'People & Channel Supervisor',
            'keterangan_jabatan' => '',
        ]);
        UserJabatanPusat::create([
            'id' => 4,
            'nama_jabatan' => 'Area Supervisor',
            'keterangan_jabatan' => '',
        ]);
        UserJabatanPusat::create([
            'id' => 5,
            'nama_jabatan' => 'Marketing Manager',
            'keterangan_jabatan' => '',
        ]);
    }
}
