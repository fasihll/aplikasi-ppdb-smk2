@extends('backend.template')
@section('title', 'Edit Jurusan')
@section('content')
    <h2>Edit Jurusan</h2>
    <form action="/editJurusan/{{ $jurusan->id_jurusan }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="nama_jurusan">Nama Jurusan</label>
                    <input type="text" name="nama_jurusan" id="nama_jurusan"
                        class="form-control @error('nama_jurusan') is-invalid @enderror"
                        value="{{ $jurusan->nama_jurusan }}">
                    @error('nama_jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kuota">Kuota</label>
                    <input type="number" name="kuota" id="kuota" class="form-control  @error('kuota') is-invalid @enderror"
                        value="{{ $jurusan->kuota }}">
                    @error('kuota')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rata_rata">Rata Rata</label>
                    <input type="number" name="rata_rata" id="rata_rata"
                        class="form-control @error('rata_rata') is-invalid @enderror" value="{{ $jurusan->rata_rata }}">
                    @error('rata_rata')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('dataJurusan') }}" class="btn btn-danger">Batal</a>
            </div>
        </div>

    </form>
@endsection
