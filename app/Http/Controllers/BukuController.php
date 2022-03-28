<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller
{
    public function index()
    {
        // membuat pagibation
        $batas = 5;
        $jml_buku = Buku::count();
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        //membuat nomor urut buku
        $no = $batas * ($data_buku->currentPage() - 1);
        return view('books.index', compact('data_buku', 'no', 'jml_buku'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $buku = new Buku;
        $buku->judul        = $request->judul;
        $buku->penulis      = $request->penulis;
        $buku->harga        = $request->harga;
        $buku->tgl_terbit   = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku')->with('pesan', 'Data buku berhasil disimpan');
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesan', 'Data buku berhasil dihapus');
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        return view('books.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);
        $buku->judul        = $request->judul;
        $buku->penulis      = $request->penulis;
        $buku->harga        = $request->harga;
        $buku->tgl_terbit   = $request->tgl_terbit;
        $buku->update();
        return redirect('/buku')->with('pesan', 'Data buku berhasil diupdate');

    }

    //fungsi search
    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul', 'like', "%".$cari."%")->paginate($batas);
        $no = $batas * ($data_buku->currentpage() - 1);
        return view('books.search', compact('data_buku', 'no', 'cari'));
    }
}
