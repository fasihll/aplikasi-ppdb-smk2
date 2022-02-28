<?php

namespace App\Http\Controllers;

use App\Models\BiodataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataBiodata extends Controller
{
    public function __construct()
    {
        $this->BiodataModel = new BiodataModel();
    }
    public function index()
    {
        $data = [
            'biodata' => DB::select('SELECT biodata.*,js.nama_jurusan as pilihan1,jd.nama_jurusan as pilihan2,ktm.nama_ktm FROM biodata JOIN ktm ON ktm.id_ktm=biodata.id_ktm JOIN jurusan js ON js.id_jurusan=biodata.id_jurusan1 JOIN jurusan jd ON jd.id_jurusan=biodata.id_jurusan2')
        ];
        return view('backend.dataBiodata', $data);
    }
    public function edit($id_biodata)
    {
        $data = [
            'biodata' => $this->BiodataModel->getBiodatabyid($id_biodata),
            'row' => DB::table('biodata')->where('id_user', $id_biodata)->count(),
            'ktm' => DB::table('ktm')->get(),
            'jurusan' => DB::table('jurusan')->get()
        ];
        return view('backend.editBiodata', $data);
    }
    public function update(Request $request, $id_biodata)
    {
        $biodata = DB::table('biodata')->where('id_biodata', $id_biodata)->first();
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
            if ($biodata->foto != "" || $biodata->foto != null) {
                unlink(public_path('images/' . $biodata->foto . ''));
            }

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
            ];

            DB::table('biodata')->where('id_biodata', $id_biodata)->update($data);
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
            ];
            DB::table('biodata')->where('id_biodata', $id_biodata)->update($data);
        }
        return redirect()->route('dataBiodata')->with('message', 'Data Telah Di Update!');
    }
    public function delete($id_biodata)
    {
        $biodata = DB::table('biodata')->where('id_biodata', $id_biodata)->first();
        if ($biodata->foto != "" || $biodata->foto != null) {
            unlink(public_path('images/' . $biodata->foto . ''));
        };
        DB::table('biodata')->where('id_biodata', $id_biodata)->delete();
        return redirect()->route('dataBiodata')->with('message', 'Data Berhasil Di Hapus!!');
    }
}
