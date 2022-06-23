<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusProposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_status',
        'keterangan_status',
    ];

}
