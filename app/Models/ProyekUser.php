<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyekUser extends Model
{
    use HasFactory;

    protected $table = 'proyek_user';

    protected $fillable = [
        'proyek_id',
        'user_id',
        'sebagai',
        'keterangan',
    ];

    // Relasi ke proyek
    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
