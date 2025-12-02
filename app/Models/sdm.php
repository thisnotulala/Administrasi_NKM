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
}
