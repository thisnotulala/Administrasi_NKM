<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progress extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyek_id',
        'persentase',
        'keterangan',
        'status_validasi',
        'dibuat_oleh',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }
}
