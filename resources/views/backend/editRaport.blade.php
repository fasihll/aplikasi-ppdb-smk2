@extends('backend.template')
@section('title', 'Edit Raport')
@section('content')
    <h2>Edit Raport</h2>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="/editRaport/{{ $id_user }}" method="post">
        @csrf


        <h4>Semester1</h4>
        @foreach ($raport as $m)
            <div class="form-group row">
                <label for="mapelsms1" class="col-sm-4 col-form-label">{{ $m->nama_mapel }}</label>
                <div class="col-sm-8">
                    <input type="text" name="{{ $m->nama_mapel }}1" id="mapelsms1" class="form-control"
                        value="{{ $m->semester1 }}">
                </div>
            </div>
        @endforeach

        <h4>Semester2</h4>
        @foreach ($raport as $m)
            <div class="form-group row">
                <label for="mapelsms2" class="col-sm-4 col-form-label">{{ $m->nama_mapel }}</label>
                <div class="col-sm-8">
                    <input type="text" name="{{ $m->nama_mapel }}2" id="mapelsms2" class="form-control"
                        value="{{ $m->semester2 }}">
                </div>
            </div>
        @endforeach

        <h4>Semester3</h4>
        @foreach ($raport as $m)
            <div class="form-group row">
                <label for="mapelsms3" class="col-sm-4 col-form-label">{{ $m->nama_mapel }}</label>
                <div class="col-sm-8">
                    <input type="text" name="{{ $m->nama_mapel }}3" id="mapelsms3" class="form-control"
                        value="{{ $m->semester3 }}">
                </div>
            </div>
        @endforeach

        <h4>Semester4</h4>
        @foreach ($raport as $m)
            <div class="form-group row">
                <label for="mapelsms4" class="col-sm-4 col-form-label">{{ $m->nama_mapel }}</label>
                <div class="col-sm-8">
                    <input type="text" name="{{ $m->nama_mapel }}4" id="mapelsms4" class="form-control"
                        value="{{ $m->semester4 }}">
                </div>
            </div>
        @endforeach

        <h4>Semester5</h4>
        @foreach ($raport as $m)
            <div class="form-group row">
                <label for="mapelsms5" class="col-sm-4 col-form-label">{{ $m->nama_mapel }}</label>
                <div class="col-sm-8">
                    <input type="text" name="{{ $m->nama_mapel }}5" id="mapelsms5" class="form-control"
                        value="{{ $m->semester5 }}">
                </div>
            </div>
        @endforeach

        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('dataRaport') }}" class="btn btn-danger">Batal</a>
    </form>
@endsection
