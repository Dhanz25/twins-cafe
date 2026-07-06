<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_produk',
        'image',
        'harga',
        'stok',
        'id_kategori'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return 'https://via.placeholder.com/600x400?text=No+Image';
        }
        
        // Cek jika gambar ada di public/uploads
        if (file_exists(public_path('uploads/' . $this->image))) {
            return asset('uploads/' . $this->image);
        }
        
        // Fallback ke public/images
        return asset('images/' . $this->image);
    }
}
