<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    use HasFactory;
    protected $table = 'rawat';
    protected $fillable = [
        'nama_pasien',
        'no_hp',
        'alamat',
        'pengajuan',
        'keluhan',
        'alasan',
        'tanggal_masuk',
        'tanggal_keluar',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
