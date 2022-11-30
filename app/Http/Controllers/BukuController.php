<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // tampilan data buku
        $data = Buku::all();
        return view('buku.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /// tampilan tambah data buku
        $kategori = Kategori::all();
        return view('buku.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // menambah data buku
        $data = $request->all();
        $data['cover'] = Storage::put('img', $request->file('cover'));
        Buku::create($data);
        return redirect('buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        // tampilan edit data kategori
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        //  mengedit data buku
        $data = $request->all();
        try {
            // jika cover ada perubahan
            $data['cover'] = Storage::put('img', $request->cover);
            $buku->update($data);
        } catch (\Throwable $th) {
            // jika cover tidak ada perubahan
            $data['cover'] = $buku->cover;
            $buku->update($data);
        }
        return redirect('buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        //  menghapus data buku
        $buku->delete();
        return redirect('buku');
    }

    public function tampil()
    {
        // menampilkan data buku pada halaman beranda
        $data = Buku::where('status', 'Aktif')->get();
        return view('beranda', compact('data'));
    }
}
