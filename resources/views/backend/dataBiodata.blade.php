@extends('backend.template')
@section('title', 'dataBiodata')
@section('content')
<h2>Data Biodata</h2>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<table class="table table-hover" id="dataTable">
    <thead class="">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>nisn</th>
            <th>nama lengkap</th>
            <th>jenis kelamin</th>
            <th>sekolah asal</th>
            <th>KTM</th>
            <th>pilihan1</th>
            <th>pilihan2</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($biodata as $b)
            <tr>
                <td>{{ $no++ }}</td>
                <td>
                    <img src="{{ url('images/' . $b->foto . '') }}" alt="foto" class="img fluid" width="50">
                </td>
                <td>{{ $b->nisn }}</td>
                <td>{{ $b->nama_lengkap }}</td>
                <td>{{ $b->jenis_kelamin }}</td>
                <td>{{ $b->sekolah_asal }}</td>
                <td>{{ $b->nama_ktm }}</td>
                <td>{{ $b->pilihan1 }}</td>
                <td>{{ $b->pilihan2 }}</td>
                <td class="d-flex">
                    <a href="/editBiodata/{{ $b->id_biodata }}" class="btn btn-warning"><span
                            class="fa fa-edit"></span></a>
                    <a href="/deleteBiodata/{{ $b->id_biodata }}" class="btn btn-danger"><span class="fa fa-trash"
                            onclick="return confirm('Apakah Anda Yakin!!')"></span></a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
