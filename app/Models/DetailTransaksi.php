<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['id_transaksi', 'id_produk', 'jumlah', 'subtotal'];

    public $timestamps = true;
}
