@extends('backend.template')
@section('title', 'Data Jurusan')
@section('content')
    <h2>Data Jurusan</h2>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <a href="{{ route('tambahJurusan') }}" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah</a>
    <table class="table table-hover" id="dataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jurusan</th>
                <th>Kuota</th>
                <th>Rata Rata</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($jurusan as $j)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $j->nama_jurusan }}</td>
                    <td>{{ $j->kuota }}</td>
                    <td>{{ $j->rata_rata }}</td>
                    <td>
                        <a href="/editJurusan/{{ $j->id_jurusan }}" class="btn btn-warning"><span
                                class="fa fa-edit"></span></a>
                        <a href="/deleteJurusan/{{ $j->id_jurusan }}" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda Yakin!')"><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
