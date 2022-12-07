<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $guarded = [];
    public function menu()
    {
        # menentukan relasi tabel kategori ke tabel menu
        return $this->hasMany(Menu::class);
    }
}