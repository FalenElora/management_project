<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyekFitur extends Model
{
    use HasFactory;

    protected $table = 'proyek_fitur';

    protected $fillable = [
        'proyek_id',
        'nama_fitur',
        'keterangan',
        'status_fitur',
    ];

    // Relasi ke Proyek
    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    // Relasi ke user lewat pivot proyek_fitur_user
    public function users()
    {
        return $this->belongsToMany(User::class, 'proyek_fitur_user', 'proyek_fitur_id', 'user_id')
                    ->withPivot('keterangan')
                    ->withTimestamps();
    }

    // Relasi ke catatan pekerjaan
    public function catatanPekerjaan()
    {
        return $this->hasMany(ProyekCatatanPekerjaan::class, 'proyek_fitur_id');
    }
}
