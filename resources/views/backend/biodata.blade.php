@extends('backend.template')
@section('title', 'Biodata')
@section('content')
    <h2>Biodata</h2>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form action="{{ route('biodata') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    @if ($biodata)
                        <img src="{{ url('images/' . $biodata->foto . '') }}" alt="" width="150">
                    @else
                        <img src="{{ url('images/default-profile.jpg') }}" alt="" width="150">

                    @endif
                </div>
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="number" name="nisn" id="nisn" class="form-control @error('nisn') is-invalid @enderror" @if ($row > 0) value="{{ $biodata->nisn }}" disabled @else value="{{ old('nisn') }}" @endif>
                    @error('nisn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap"
                        class="form-control @error('nama_lengkap') is-invalid @enderror" @if ($row > 0) value="{{ $biodata->nama_lengkap }}" disabled 
                        @else value="{{ old('nama_lengkap') }}" @endif>
                    @error('nama_lengkap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nisn">jenis_kelamin</label><br>
                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin"
                        class=" @error('jenis_kelamin') is-invalid @enderror" value="laki-laki" @if ($row > 0) disabled @endif @if ($biodata->jenis_kelamin == 'laki-laki') checked @endif> Laki-Laki
                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin"
                        class=" @error('jenis_kelamin') is-invalid @enderror" value="perempuan" @if ($row > 0) disabled @endif @if ($biodata->jenis_kelamin == 'perempuan') checked @endif> Perempuan
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tgl Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir"
                        class="form-control @error('tgl_lahir') is-invalid @enderror" @if ($row > 0) value="{{ $biodata->tgl_lahir }}" disabled @endif
                        value="{{ old('tgl_lehir') }}">
                    @error('tgl_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                        class="form-control @error('tempat_lahir') is-invalid @enderror" @if ($row > 0) value="{{ $biodata->tempat_lahir }}" disabled @endif value="{{ old('tempat_lahir') }}">
                    @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror"
                        @if ($row > 0) value="{{ $biodata->alamat }}" disabled @endif
                        value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="number" name="telepon" id="telepon"
                        class="form-control @error('telepon') is-invalid @enderror" @if ($row > 0) value="{{ $biodata->telepon }}" disabled @endif
                        value="{{ old('telepon') }}">
                    @error('telepon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sekolah_asal">Sekolah Asal</label>
                    <input type="text" name="sekolah_asal" id="sekolah_asal"
                        class="form-control @error('sekolah_asal') is-invalid @enderror" @if ($row > 0) value="{{ $biodata->sekolah_asal }}" disabled @endif value="{{ old('sekolah_asal') }}">
                    @error('sekolah_asal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label for="id_ktm">Keterangan Tidak Mampu</label>
                    <select name="id_ktm" id="id_ktm" class="form-control @error('id_ktm') is-invalid @enderror" @if ($row > 0) disabled @endif>

                        @if ($row > 0)
                            <option value="{{ $biodata->id_ktm }}" selected hidden>{{ $biodata->nama_ktm }}</option>
                        @else
                            <option value="" selected hidden>Pilih Keterangan Tidak Mamapu</option>
                        @endif

                        @foreach ($ktm as $k)
                            <option value="{{ $k->id_ktm }}">{{ $k->nama_ktm }}</option>
                        @endforeach
                    </select>
                    @error('id_ktm')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_jurusan1">Jurusan 1</label>
                    <select name="id_jurusan1" id="id_jurusan1"
                        class="form-control @error('id_jurusan1') is-invalid @enderror" @if ($row > 0) disabled @endif>

                        @if ($row > 0)
                            <option value="{{ $biodata->id_jurusan1 }}" selected hidden>{{ $biodata->jurusan1 }}
                            </option>
                        @else
                            <option value="" selected hidden>Pilih Jurusan 1</option>
                        @endif

                        @foreach ($jurusan as $j)
                            <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}</option>
                        @endforeach
                    </select>
                    @error('id_jurusan1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_jurusan2">Jurusan 2</label>
                    <select name="id_jurusan2" id="id_jurusan2"
                        class="form-control @error('id_jurusan2') is-invalid @enderror" @if ($row > 0) disabled @endif>

                        @if ($row > 0)
                            <option value="{{ $biodata->id_jurusan2 }}" selected hidden>{{ $biodata->jurusan2 }}
                            </option>
                        @else
                            <option value="" selected hidden>Pilih Jurusan 2</option>
                        @endif

                        @foreach ($jurusan as $j)
                            <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}</option>
                        @endforeach
                    </select>
                    @error('id_jurusan2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label><br>
                    <small class="text-danger">foto ukuran 3x4</small>
                    <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" @if ($row > 0) disabled @endif>
                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" name="submit" class="btn btn-success" @if ($biodata) disabled @endif>Simpan</button>


            </div>
        </div>
    </form>
@endsection
