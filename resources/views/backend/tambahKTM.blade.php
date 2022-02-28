@extends('backend.template')
@section('title', 'tambah KTM')
@section('content')
    <h2>Tambah Keterangan Tidak Mampu</h2>
    <form action="{{ route('tambahKTM') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="nama_ktm">Nama KTM</label>
                    <input type="text" name="nama_ktm" id="nama_ktm"
                        class="form-control @error('nama_ktm') is-invalid @enderror" value="{{ old('nama_ktm') }}">
                    @error('nama_ktm')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="keterangan">keterangan</label>
                    <input type="text" name="keterangan" id="keterangan"
                        class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}">
                    @error('keterangan')
                        {{ $message }}
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('dataKTM') }}" class="btn btn-danger">Batal</a>
            </div>
        </div>

    </form>
@endsection
