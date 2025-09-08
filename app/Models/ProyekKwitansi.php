<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyekKwitansi extends Model
{
    use HasFactory;

    protected $table = 'proyek_kwitansi';

    protected $fillable = [
        'nomor_kwitansi',
        'nomor_invoice',
        'proyek_id',
        'judul_kwitansi',
        'jumlah',
        'tanggal_kwitansi',
        'keterangan',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }
}
