<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPerusahaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perusahaan',
        'npwp',
        
    ];
}
