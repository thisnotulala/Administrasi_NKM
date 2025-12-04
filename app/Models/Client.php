<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_client',
        'email',
        'telepon',
        'alamat'
    ];

    public function proyek()
    {
        return $this->hasMany(Proyek::class);
    }
}
