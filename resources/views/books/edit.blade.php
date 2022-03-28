@extends('layouts.master')

@section('content')
    <div class="container">
        <h4>Edit data buku</h4>
        <form action="{{ route('buku.update', $buku->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ $buku->judul}}">
        </div>
        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" id="penulis" value="{{ $buku->penulis }}">
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" value="{{ $buku->harga}}">
        </div>
        <div class="form-group">
            <label for="tgl_terbit">Tgl. terbit</label>
            <input type="date" name="tgl_terbit" id="tgl_terbit" value="{{ $buku->tgl_tebit}}">
        </div>
            <button type="submit">Update</button>
            <a href="/buku">Batal</a>
        </form>
    </div> 
@endsection