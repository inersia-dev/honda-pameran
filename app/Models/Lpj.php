<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proposal;

class Lpj extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'id_proposal',
        'periode_start_lp',
        'periode_end_lp',
        'lokasi_lpj',
        'target_database_lpj',
        'target_penjualan_lpj',
        'target_prospectus_lpj',
        'dana_lpj',
        'dokumentasi_lpj',
        'problem_identification_lpj',
        'corrective_action_lpj',
    ];

    public function proposal()
    {
        return $this->hasOne(Proposal::class, 'id', 'id_proposal');
    }

}
