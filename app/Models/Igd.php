<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Igd extends Model
{
    use HasFactory;
    protected $table = 'igd';
    protected $fillable = [
        'nama_pasien',
        'no_hp',
        'alamat',
        'keluhan',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
