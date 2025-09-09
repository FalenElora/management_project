<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyekFile extends Model
{
    use HasFactory;

    protected $table = 'proyek_file'; // sesuai migration kamu
    protected $fillable = [
        'proyek_id',
        'nama_file',
        'keterangan',
        'path',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }
}
