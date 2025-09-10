<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyekFile extends Model
{
    use HasFactory;

    public $timestamps = false; // ← Ini yang mematikan updated_at & created_at

    protected $table = 'proyek_file';

    protected $fillable = [
        'nama_file',
        'keterangan',
        'path',
        'user_id',
        'proyek_id',
    ];

    // Relasi contoh (jika ada)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }
}
