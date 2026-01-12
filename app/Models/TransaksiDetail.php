<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    // migration creates table `detail_transaksi`
    protected $table = 'transaksi_detail';

    // primary key column in migration is `id_detail`
    protected $primaryKey = 'id_detail';
    public $incrementing = true;

    // migration columns: id_detail, id_transaksi, id_produk, jumlah, subtotal
    protected $fillable = [
        'id_transaksi',
        'id_produk',
        'jumlah',
        'subtotal'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }

    // Provide `qty` attribute used by blades as alias for `jumlah`
    public function getQtyAttribute()
    {
        return $this->attributes['jumlah'] ?? null;
    }

    // Provide `harga` attribute: if explicit harga present, return it; otherwise compute from subtotal/jumlah
    public function getHargaAttribute()
    {
        if (array_key_exists('harga', $this->attributes)) {
            return $this->attributes['harga'];
        }
        $jumlah = $this->attributes['jumlah'] ?? 0;
        $subtotal = $this->attributes['subtotal'] ?? 0;
        if ($jumlah && $jumlah != 0) {
            return intval($subtotal / $jumlah);
        }
        return 0;
    }
}
