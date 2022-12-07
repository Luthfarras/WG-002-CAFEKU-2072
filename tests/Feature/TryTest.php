<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_home()
    {
        //testing mengakses halaman utama
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_login()
    {
        //testing login salah satu user
        $response = $this->post('/login', [
            'email' => 'owner0@gmail.com',
            'password' => '12345678',
        ]);

        $response->assertStatus(302);
    }

    public function test_add_category()
    {
        //testing menambah data ke tabel kategori
        $user = User::factory()->create();
        $response = $this->actingAs($user)->withSession(['banned' => false])->post('/kategori', [
            'nama' => 'Latte',
        ]);
        $response->assertStatus(302);
    }

    public function test_update_category()
    {
        //testing mengupdate salah satu data dalam tabel kategori
        $user = User::factory()->create();
        $response = $this->actingAs($user)->withSession(['banned' => false])->put('/kategori/4', [
            'nama' => 'Kudapan Berat',
        ]);
        $response->assertStatus(302);
    }
}
