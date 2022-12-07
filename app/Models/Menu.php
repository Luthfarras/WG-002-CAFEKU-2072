<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $guarded = [];
    public function kategori()
    {
        # menentukan relasi dari tabel menu ke tabel kategori
        return $this->belongsTo(Kategori::class);
    }
}
