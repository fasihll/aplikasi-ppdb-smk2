@extends('backend.template')
@section('title', 'Data Raport')
@section('content')
    <h2>Data Raport</h2>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <table class="table table-hover" id="dataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Nilai Mapel Terkumpul</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($raport as $r)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $r->name }}</td>
                    <td>{{ $r->jumlah_mapel }}</td>
                    <td>
                        <a href="/detailRaport/{{ $r->id }}" class="btn btn-white"><span
                                class="fa fa-eye"></span></a>
                        <a href="/editRaport/{{ $r->id }}" class="btn btn-warning"><span
                                class="fa fa-edit"></span></a>
                        <a href="/deleteRaport/{{ $r->id }}" class="btn btn-danger"
                            onclick="return confirm('apakah anda yakin!')"><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
