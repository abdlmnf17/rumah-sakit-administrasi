<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatJalan extends Model
{
    use HasFactory;
    protected $table = 'rawat_jalan';
    protected $fillable = [
        'nama_pasien',
        'no_hp',
        'alamat',
        'keluhan',
        'alasan',
        'tanggal_periksa',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
