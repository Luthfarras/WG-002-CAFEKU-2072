<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //membuat isi dari tabel kategori dengan seeder
        Kategori::create([
            'nama' => 'Coffee',
        ]);
        Kategori::create([
            'nama' => 'Non Coffee',
        ]);
        Kategori::create([
            'nama' => 'Kudapan Ringan',
        ]);
        Kategori::create([
            'nama' => 'Makanan Berat',
        ]);
    }
}
