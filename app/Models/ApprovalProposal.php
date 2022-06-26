<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pusat;

class ApprovalProposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_proposal',
        'user_approval',
        'status_approval',
        'keterangan_approval',
    ];

    public function userapp()
    {
        return $this->hasOne(Pusat::class, 'id', 'user_approval');
    }
}
