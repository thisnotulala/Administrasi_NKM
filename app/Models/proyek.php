<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_proyek',
        'client_id',
        'lokasi',
        'nilai_kontrak',
        'rencana_mulai',
        'rencana_selesai',
        'status',
        'deskripsi',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function jadwal()
    {
        return $this->hasMany(JadwalProyek::class, 'proyek_id');
    }

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class, 'proyek_id');
    }
    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

}
