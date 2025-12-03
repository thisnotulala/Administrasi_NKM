<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalProyek extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyek_id',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    public function logs()
    {
        return $this->hasMany(LogJadwalProyek::class, 'jadwal_id');
    }
}
