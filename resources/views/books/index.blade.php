@extends('layouts.master')

@section('content')
    <div class="container">
        {{-- cek pesan konfirmasi --}}
        @if (Session::has('pesan'))
            <div class="alert alert-success">{{ Session::get('pesan') }}</div>
        @endif
        <h4>Data buku</h4>
        <p align="right"><a href="{{ route('buku.create') }}" class="btn btn-secondary">Tambah buku</a></p>
        <form action="{{ route('buku.search') }}" method="get">
            @csrf
            <input type="text" name="kata" placeholder="Cari...">
        </form> 
        <br> 
        <br>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tgl. Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_buku as $buku)
                  <tr>
                    <td>{{  ++$no }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>    
                    <td>{{ number_format($buku->harga, 0, ',', '.') }}</td> 
                    <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                    <td>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                            @csrf
                            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-danger">Edit</a>
                            <button onclick="return confirm('Anda yakin menghapus data ini?')" class="btn btn-warning">Hapus</button>
                        </form>    
                    </td>   
                </tr>  
                @endforeach
            </tbody>
        </table>
        <div>Jumlah buku : {{ $jml_buku }}</div>
        <div>{{ $data_buku->links() }}</div>
    </div>
    
@endsection