<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BiodataModel extends Model
{
    use HasFactory;
    public function getBiodatabyUser($id_user)
    {
        return DB::table('biodata')
            ->join('jurusan as jrs', 'jrs.id_jurusan', '=', 'biodata.id_jurusan1')
            ->join('jurusan as jrd', 'jrd.id_jurusan', '=', 'biodata.id_jurusan2')
            ->join('ktm', 'ktm.id_ktm', '=', 'biodata.id_ktm')
            ->select('*', 'jrs.nama_jurusan as jurusan1', 'jrd.nama_jurusan as jurusan2', 'jrs.kuota as kuota1', 'jrs.rata_rata as rata_rata1', 'jrd.kuota as kuota2', 'jrd.rata_rata as rata_rata2', 'jrs.id_jurusan as id_jurusan1', 'jrd.id_jurusan as id_jurusan2')
            ->where('biodata.id_user', $id_user)
            ->first();
    }
    public function getBiodatabyid($id_biodata)
    {
        return DB::table('biodata')
            ->join('jurusan as jrs', 'jrs.id_jurusan', '=', 'biodata.id_jurusan1')
            ->join('jurusan as jrd', 'jrd.id_jurusan', '=', 'biodata.id_jurusan2')
            ->join('ktm', 'ktm.id_ktm', '=', 'biodata.id_ktm')
            ->select('*', 'jrs.nama_jurusan as jurusan1', 'jrd.nama_jurusan as jurusan2', 'jrs.kuota as kuota1', 'jrs.rata_rata as rata_rata1', 'jrd.kuota as kuota2', 'jrd.rata_rata as rata_rata2', 'jrs.id_jurusan as id_jurusan1', 'jrd.id_jurusan as id_jurusan2')
            ->where('biodata.id_biodata', $id_biodata)
            ->first();
    }
}
