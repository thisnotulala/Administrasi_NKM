<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogJadwalProyek extends Model
{
    use HasFactory;

    protected $fillable = [
        'jadwal_id',
        'tanggal_mulai_lama',
        'tanggal_mulai_baru',
        'tanggal_selesai_lama',
        'tanggal_selesai_baru',
        'user_id',
    ];

    public function jadwal()
    {
        return $this->belongsTo(JadwalProyek::class, 'jadwal_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
