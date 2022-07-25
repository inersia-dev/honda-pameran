<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proposal;

class Dealer extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_dealer',
        'nama_dealer',
        'kota_dealer',
        'alamat_dealer',
        'area_dealer',
        'user_dealer',
    ];

    public function proposal()
    {
        return $this->hasMany(Proposal::class, 'dealer_proposal', 'id');
    }

    public function jumlahpenjualanlpj()
    {
        return $this->hasMany(Proposal::class, 'dealer_proposal', 'id')
                    ->with(['lpj' => function($query){
                        $query->sum('target_penjualan_lpj');
                     }]);
    }
}
