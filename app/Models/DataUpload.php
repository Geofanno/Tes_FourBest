<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_bukti',
        'tanggal_bukti',
        'npwp_pemotong',
        'nama_pemotong',
        'identitas_penerima',
        'nama_penerima',
        'penghasilan_bruto',
        'pph',
        'kode_objek_pajak',
        'masa_pajak',
        'tahun_pajak',
        'status',
        'rev_no',
        'posting',
        'id_sistem',
        'file_path',
    ];
}
