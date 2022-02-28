@extends('backend.template')
@section('title', 'Raport')
@section('content')
    <h2>Raport</h2>
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
    <form action="{{ route('raport') }}" method="post">
        @csrf
        @if ($row >= 1)

            <h4>Semester1</h4>
            @foreach ($raport as $m)
                <div class="form-group row">
                    <label for="mapelsms1" class="col-sm-4 col-form-label">{{ $m->nama_mapel }}</label>
                    <div class="col-sm-8">
                        <input type="text" name="{{ $m->nama_mapel }}1" id="mapelsms1" class="form-control" @if ($raport) value="{{ $m->semester1 }}" disabled @endif>
                    </div>
                </div>
            @endforeach

            <h4>Semester2</h4>
            @foreach ($raport as $m)
                <div class="form-group row">
                    <label for="mapelsms2" class="col-sm-4 col-form-label">{{ $m->nama_mapel }}</label>
                    <div class="col-sm-8">
                        <input type="text" name="{{ $m->nama_mapel }}2" id="mapelsms2" class="form-control" @if ($raport) value="{{ $m->semester2 }}" disabled @endif>
                    </div>
                </div>
            @endforeach

            <h4>Semester3</h4>
            @foreach ($raport as $m)
                <div class="form-group row">
                    <label for="mapelsms3" class="col-sm-4 col-form-label">{{ $m->nama_mapel }}</label>
                    <div class="col-sm-8">
                        <input type="text" name="{{ $m->nama_mapel }}3" id="mapelsms3" class="form-control" @if ($raport) value="{{ $m->semester3 }}" disabled @endif>
                    </div>
                </div>
            @endforeach

            <h4>Semester4</h4>
            @foreach ($raport as $m)
                <div class="form-group row">
                    <label for="mapelsms4" class="col-sm-4 col-form-label">{{ $m->nama_mapel }}</label>
                    <div class="col-sm-8">
                        <input type="text" name="{{ $m->nama_mapel }}4" id="mapelsms4" class="form-control" @if ($raport) value="{{ $m->semester4 }}" disabled @endif>
                    </div>
                </div>
            @endforeach

            <h4>Semester5</h4>
            @foreach ($raport as $m)
                <div class="form-group row">
                    <label for="mapelsms5" class="col-sm-4 col-form-label">{{ $m->nama_mapel }}</label>
                    <div class="col-sm-8">
                        <input type="text" name="{{ $m->nama_mapel }}5" id="mapelsms5" class="form-control" @if ($raport) value="{{ $m->semester5 }}" disabled @endif>
                    </div>
                </div>
            @endforeach

        @else
            <h4>Semester1</h4>
            @foreach ($mapel as $m)
                <div class="form-group row">
                    <label for="mapelsms1" class="col-sm-4 col-form-label">{{ $m->nama_mapel }}</label>
                    <div class="col-sm-8">
                        <input type="text" name="{{ $m->nama_mapel }}1" id="mapelsms1" class="form-control"
                            value="{{ old($m->nama_mapel . '1') }}">
                    </div>
                </div>
            @endforeach

            <h4>Semester2</h4>
            @foreach ($mapel as $m)
                <div class="form-group row">
                    <label for="mapelsms2" class="col-sm-4 col-form-label">{{ $m->nama_mapel }}</label>
                    <div class="col-sm-8">
                        <input type="text" name="{{ $m->nama_mapel }}2" id="mapelsms2" class="form-control"
                            value="{{ old($m->nama_mapel . '2') }}">
                    </div>
                </div>
            @endforeach

            <h4>Semester3</h4>
            @foreach ($mapel as $m)
                <div class="form-group row">
                    <label for="mapelsms3" class="col-sm-4 col-form-label">{{ $m->nama_mapel }}</label>
                    <div class="col-sm-8">
                        <input type="text" name="{{ $m->nama_mapel }}3" id="mapelsms3" class="form-control"
                            value="{{ old($m->nama_mapel . '3') }}">
                    </div>
                </div>
            @endforeach

            <h4>Semester4</h4>
            @foreach ($mapel as $m)
                <div class="form-group row">
                    <label for="mapelsms4" class="col-sm-4 col-form-label">{{ $m->nama_mapel }}</label>
                    <div class="col-sm-8">
                        <input type="text" name="{{ $m->nama_mapel }}4" id="mapelsms4" class="form-control"
                            value="{{ old($m->nama_mapel . '4') }}">
                    </div>
                </div>
            @endforeach

            <h4>Semester5</h4>
            @foreach ($mapel as $m)
                <div class="form-group row">
                    <label for="mapelsms5" class="col-sm-4 col-form-label">{{ $m->nama_mapel }}</label>
                    <div class="col-sm-8">
                        <input type="text" name="{{ $m->nama_mapel }}5" id="mapelsms5" class="form-control"
                            value="{{ old($m->nama_mapel . '5') }}">
                    </div>
                </div>
            @endforeach
        @endif
        <button type="submit" name="submit" class="btn btn-success" @if ($row >= 1) disabled @endif>Simpan</button>
    </form>
@endsection
