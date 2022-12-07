<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // menampilkan seluruh menu ke halaman utama
        $data = Menu::all();
        return view('home', compact('data'));
    }

    public function dashboard()
    {
        # menampilkan halaman dashboard
        return view('dashboard');
    }

    public function store(Request $request)
    {
        # mengambil nilai request lalu memunculkan kembali ke halaman dashboard
        $nama = $request->nama;
        $status = $request->status;
        $jumlah = count($request->pesanan);
        $order = $request->pesanan;
        $total = 0;
        foreach ($order as $o) {
            $total += $o;
        }
        $new = new Total($request->status, $total);
        $data = [
            'nama' => $nama,
            'jumlah' => $jumlah,
            'total' => $total,
            'status' => $status,
            'diskon' => $new->diskon(),
            'bayar' => $new->bayar(),
        ];
        return view('dashboard', compact('data'));
    }
}

interface Pesanan {
    //mendeklarasi method diskon
    public function diskon();
}

class Diskon implements Pesanan {
    public function __construct($status, $total)
    {
        # deklarasi parameter
        $this->status = $status;
        $this->total = $total;
    }
    public function diskon()
    {
        # cek diskon yang didapat berdasarkan status dan total pesanan
        if ($this->status == 'Member' && $this->total >= 100000) {
            return $this->total * 0.2;
        }elseif ($this->status == 'Member' && $this->total < 100000) {
            return $this->total * 0.1;
        }else {
            return 0;
        }
    }
}

class Total extends Diskon {
    public function bayar()
    {
        # cek total yang perlu dibayarkan setelah mendapat diskon
        return $this->total - $this->diskon();
    }
}