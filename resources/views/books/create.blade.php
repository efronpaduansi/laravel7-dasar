@extends('layouts.master')

@section('content')
  <div class="container text-left col-md-6">
    <div class="card">
        <div class="card-header">
          Tambah data buku
        </div>
        <div class="card-body">
          <h5 class="card-title">
              <form action="{{ route('buku.store') }}" method="post">
                @csrf
               <div class="form-group">
                   <label for="judul">Judul : </label>
                   <input type="text" name="judul" class="form-control">
                   <label for="penulis">Penulis : </label>
                   <input type="text" name="penulis" class="form-control">
                   <label for="harga">Harga : </label>
                   <input type="number" name="harga" class="form-control">
                   <label for="tgl_terbit">Tgl. Terbit</label>
                   <input type="date" name="tgl_terbit" class="form-control">
               </div>
               <button type="submit" class="btn btn-secondary">Simpan</button>
               <a href="/buku">Batal</a>
             </form>
          </h5>
        
        </div>
      </div>
  </div>
@endsection