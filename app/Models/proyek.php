<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyek extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_proyek',
        'deskripsi',
        'lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];

    public function jadwal()
    {
        return $this->hasMany(JadwalProyek::class, 'proyek_id');
    }

    public function progress()
    {
        return $this->hasMany(Progress::class, 'proyek_id');
    }

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class, 'proyek_id');
    }
}
