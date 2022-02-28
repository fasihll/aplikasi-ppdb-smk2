@extends('backend.template')
@section('title', 'Laporan Peserta')
@section('content')
    <h2>Laporan Peserta</h2>

    <table class="table table-hover" id="dataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama Lengkap</th>
                <th>Sekolah Asal</th>
                <th>Pilihan1</th>
                <th>Pilihan2</th>
                <th>Rata RAta</th>
                <th>Diterima Di:</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($rata_rata as $r)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $r->nisn }}</td>
                    <td>{{ $r->nama_lengkap }}</td>
                    <td>{{ $r->sekolah_asal }}</td>
                    <td>{{ $r->pilihan1 }}</td>
                    <td>{{ $r->pilihan2 }}</td>
                    <td>{{ $r->rata_rata }}</td>

                    @if ($r->rata_rata >= $r->rata_rata1 and $r->rata_rata >= $r->rata_rata2)
                        <td>{{ $r->pilihan1 }}</td>
                    @elseif($r->rata_rata < $r->rata_rata1 and $r->rata_rata < $r->rata_rata2)
                                <td class="text-danger">Tidak Lulus</td>
                            @elseif($r->rata_rata < $r->rata_rata1 and $r->rata_rata > $r->rata_rata2)
                                    <td>{{ $r->pilihan2 }}</td>
                                @elseif($r->rata_rata > $r->rata_rata1)
                                    <td>{{ $r->piliha1 }}</td>
                    @endif

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
