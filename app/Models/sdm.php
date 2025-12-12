<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sdm extends Model
{
    use HasFactory;

    protected $table = 'sdms';

    protected $fillable = [
        'nama',
        'jabatan',
        'kontak',
        'keterangan',
    ];

    public function proyeks()
    {
        return $this->belongsToMany(Proyek::class, 'proyek_sdm')
                    ->withPivot('peran', 'tanggal_mulai', 'tanggal_selesai')
                    ->withTimestamps();
    }

}
