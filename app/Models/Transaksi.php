<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $incrementing = true;
    protected $keyType = 'int';

    // allow mass assignment for specific fields
    protected $fillable = ['tanggal', 'id_pelanggan', 'no_meja', 'total'];

    // timestamps enabled
    public $timestamps = true;
}
