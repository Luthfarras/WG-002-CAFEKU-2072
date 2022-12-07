<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh isi dalam tabel menu
        $data = Menu::all();
        $kate = Kategori::all();
        return view('menu', compact('data', 'kate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //mwnyimpan data ke dalam tabel menu
        $data = $request->all(); //deklarasi seluruh request ke dalam variabel data
        $file = $request->file('foto')->store('artikel/foto');
        $data['foto'] = $file;
        Menu::create($data);
        Alert::toast('Berhasil Menambah Menu!', 'success');
        return redirect('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //mengupdate salah satu data dalam tabel menu
        $data = $request->all();
        if ($request->file('foto')) {
            # cek apabila dalam request terdapat update foto
            $file = $request->file('foto')->store('artikel/foto'); //menyimpan file foto ke dalam folder artikel/foto
            Storage::delete($menu->foto); //hapus foto lama data menu di folder artikel/foto
            $data['foto'] = $file;
            $menu->update($data);
        }else {
            # jika tidak ada request foto
            $data['foto'] = $menu->foto;
            $menu->update($data);
        }
        Alert::toast('Berhasil Mengubah Menu!', 'info');
        return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //menghapus salah satu data dalam tabel menu
        $menu->delete();
        Storage::delete($menu->foto); //hapus file foto data menu di folder artikel/foto
        Alert::toast('Menu Telah Dihapus!', 'success');
        return redirect('menu');
    }
}
