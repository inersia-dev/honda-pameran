<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatusProposal;

class StatusProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusProposal::create([
            'id' => 1,
            'nama_status' => 'Draft',
            'warna_status' => 'outline-info',
            'keterangan_status' => '',
        ]);
        StatusProposal::create([
            'id' => 2,
            'nama_status' => 'Waiting Approval',
            'warna_status' => 'warning',
            'keterangan_status' => '',
        ]);
        StatusProposal::create([
            'id' => 3,
            'nama_status' => 'Partial Approval',
            'warna_status' => 'info',
            'keterangan_status' => '',
        ]);
        StatusProposal::create([
            'id' => 4,
            'nama_status' => 'Final',
            'warna_status' => 'success',
            'keterangan_status' => '',
        ]);
        StatusProposal::create([
            'id' => 5,
            'nama_status' => 'Revise',
            'warna_status' => 'outline-warning',
            'keterangan_status' => '',
        ]);
        StatusProposal::create([
            'id' => 6,
            'nama_status' => 'Rejected',
            'warna_status' => 'danger',
            'keterangan_status' => '',
        ]);
    }
}
