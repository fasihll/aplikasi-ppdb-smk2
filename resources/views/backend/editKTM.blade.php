@extends('backend.template')
@section('title', 'Edit KTM')
@section('content')
    <h2>Edit Keterangan Tidak Mampu</h2>
    <form action="/editKTM/{{ $ktm->id_ktm }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="nama_ktm">Nama KTM</label>
                    <input type="text" name="nama_ktm" id="nama_ktm"
                        class="form-control @error('nama_ktm') is-invalid @enderror" value="{{ $ktm->nama_ktm }}">
                    @error('nama_ktm')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="keterangan">keterangan</label>
                    <input type="text" name="keterangan" id="keterangan"
                        class="form-control @error('keterangan') is-invalid @enderror" value="{{ $ktm->keterangan }}">
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
