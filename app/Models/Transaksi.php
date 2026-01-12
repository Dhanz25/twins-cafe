<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    // primary key column in migration is `id_transaksi`
    protected $primaryKey = 'id_transaksi';
    public $incrementing = true;

    protected $fillable = [
        'session_id',
        'no_meja',
        'total',
        'status'
    ];

    public function detail()
    {
        return $this->hasMany(TransaksiDetail::class, 'id_transaksi');
    }
}
