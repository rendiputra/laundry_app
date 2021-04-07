<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "tb_transaksi";
    protected $primaryKey = "id_transaksi";
    protected $fillable = [
        'id_outlet',
        'kode_invoice',
        'id_member',
        'id_user',
        'tgl',
        'batas_waktu',
        'tgl_bayar',
        'biaya_tambahan',
        'diskon',
        'pajak',
        'status',
        'dibayar'
    ];

}
