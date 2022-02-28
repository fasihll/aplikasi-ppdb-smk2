<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BiodataModel;
use Illuminate\Support\Str;

class BiodataController extends Controller
{
    public function __construct()
    {
        $this->BiodataModel = new BiodataModel();
    }
    public function index()
    {
        $id_user = session('id_user');
        $data = [
            'biodata' => $this->BiodataModel->getBiodatabyUser($id_user),
            'row' => DB::table('biodata')->where('id_user', $id_user)->count(),
            'ktm' => DB::table('ktm')->get(),
            'jurusan' => DB::table('jurusan')->get()
        ];
        return view('backend.biodata', $data);
    }
    public function simpan(Request $request)
    {
        $id_user = session('id_user');
        $request->validate([
            "nisn" => 'required',
            "nama_lengkap" => 'required',
            "jenis_kelamin" => 'required',
            "tgl_lahir" => 'required',
            "tempat_lahir" => 'required',
            "alamat" => 'required',
            "telepon" => 'required',
            "sekolah_asal" => 'required',
            "id_ktm" => 'required',
            "id_jurusan1" => 'required',
            "id_jurusan2" => 'required',
        ]);
        if ($request->foto != "") {
            $foto = $request->foto;
            $filename = Str::random(6) . '.' . $foto->extension();
            $foto->move(public_path('images'), $filename);

            $data = [
                "foto" => $filename,
                "nisn" => $request->nisn,
                "nama_lengkap" => $request->nama_lengkap,
                "jenis_kelamin" => $request->jenis_kelamin,
                "tgl_lahir" => $request->tgl_lahir,
                "tempat_lahir" => $request->tempat_lahir,
                "alamat" => $request->alamat,
                "telepon" => $request->telepon,
                "sekolah_asal" => $request->sekolah_asal,
                "id_ktm" => $request->id_ktm,
                "id_jurusan1" => $request->id_jurusan1,
                "id_jurusan2" => $request->id_jurusan2,
                "id_user" => $id_user
            ];

            DB::table('biodata')->insert($data);
        } else {
            $data = [
                "nisn" => $request->nisn,
                "nama_lengkap" => $request->nama_lengkap,
                "jenis_kelamin" => $request->jenis_kelamin,
                "tgl_lahir" => $request->tgl_lahir,
                "tempat_lahir" => $request->tempat_lahir,
                "alamat" => $request->alamat,
                "telepon" => $request->telepon,
                "sekolah_asal" => $request->sekolah_asal,
                "id_ktm" => $request->id_ktm,
                "id_jurusan1" => $request->id_jurusan1,
                "id_jurusan2" => $request->id_jurusan2,
                "id_user" => $id_user
            ];
            DB::table('biodata')->insert($data);
        }
        return redirect()->route('biodata')->with('message', 'Data Telah Tersimpan!');
    }
}
