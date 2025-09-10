<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyekInvoice extends Model
{
    use HasFactory;

    protected $table = 'proyek_invoice'; 

    protected $fillable = [
        'nomor_invoice',
        'proyek_id',
        'judul_invoice',
        'jumlah',
        'tanggal_invoice',
        'keterangan',
        'status',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }
}
