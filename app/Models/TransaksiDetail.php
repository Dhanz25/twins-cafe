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

    // migration columns: id_detail, id_transaksi, id_produk, qty/jumlah, subtotal
    protected $fillable = [
        'id_transaksi',
        'id_produk',
        'qty',
        'jumlah',
        'subtotal'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }

    // Provide `qty` attribute used by blades; prefer `qty` column when present, fallback to `jumlah`
    public function getQtyAttribute()
    {
        if (array_key_exists('qty', $this->attributes)) {
            return $this->attributes['qty'];
        }
        return $this->attributes['jumlah'] ?? null;
    }

    // Provide `harga` attribute: if explicit harga present, return it; otherwise compute from subtotal/quantity
    public function getHargaAttribute()
    {
        if (array_key_exists('harga', $this->attributes)) {
            return $this->attributes['harga'];
        }
        $jumlah = $this->attributes['qty'] ?? $this->attributes['jumlah'] ?? 0;
        $subtotal = $this->attributes['subtotal'] ?? 0;
        if ($jumlah && $jumlah != 0) {
            return intval($subtotal / $jumlah);
        }
        return 0;
    }
}
