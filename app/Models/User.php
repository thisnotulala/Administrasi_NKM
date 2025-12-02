<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Progress yang dibuat oleh kepala lapangan
    public function progresses()
    {
        return $this->hasMany(Progress::class, 'dibuat_oleh');
    }

    // Pengeluaran yang dibuat admin
    public function pengeluarans()
    {
        return $this->hasMany(Pengeluaran::class, 'dibuat_oleh');
    }
}
