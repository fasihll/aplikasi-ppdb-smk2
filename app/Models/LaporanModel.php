<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LaporanModel extends Model
{
    use HasFactory;
    public function getRataRata()
    {
        return DB::select('SELECT biodata.nisn,biodata.nama_lengkap,biodata.sekolah_asal,js.rata_rata as rata_rata1,js.nama_jurusan as pilihan1,jd.rata_rata as rata_rata2,jd.nama_jurusan as pilihan2,SUBSTRING((AVG(raport.semester1+raport.semester2+raport.semester3+raport.semester4+raport.semester5))/5,1,2) as rata_rata FROM biodata JOIN jurusan js ON js.id_jurusan = biodata.id_jurusan1 JOIN jurusan jd ON jd.id_jurusan = biodata.id_jurusan2 JOIN raport ON raport.id_user = biodata.id_user GROUP BY raport.id_user');
    }
}
