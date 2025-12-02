<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalProyek extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyek_id',
        'tanggal',
        'aktivitas',
        'keterangan',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }
}
