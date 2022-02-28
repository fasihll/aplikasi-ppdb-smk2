<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataKTM extends Controller
{
    public function index()
    {
        $data = [
            'ktm' => DB::table('ktm')->get()
        ];
        return view('backend.dataKTM', $data);
    }
    public function tambah()
    {
        return view('backend.tambahKTM');
    }
    public function insert(Request $request)
    {
        $request->validate([
            'nama_ktm' => 'required'
        ]);
        $data = [
            'nama_ktm' => $request->nama_ktm,
            'keterangan' => $request->keterangan
        ];
        DB::table('ktm')->insert($data);
        return redirect()->route('dataKTM')->with('message', 'data berhasil di Tambahkan!');
    }
    public function edit($id_ktm)
    {
        $data = [
            'ktm' => DB::table('ktm')->where('id_ktm', $id_ktm)->first()
        ];
        return view('backend.editKTM', $data);
    }
    public function update(Request $request, $id_ktm)
    {
        $request->validate([
            'nama_ktm' => 'required'
        ]);
        $data = [
            'nama_ktm' => $request->nama_ktm,
            'keterangan' => $request->keterangan
        ];
        DB::table('ktm')->where('id_ktm', $id_ktm)->update($data);
        return redirect()->route('dataKTM')->with('message', 'data berhasil di Update!');
    }
    public function delete($id_ktm)
    {
        DB::table('ktm')->where('id_ktm', $id_ktm)->delete();
        return redirect()->route('dataKTM')->with('message', 'Data Berhasil Di Hapus!');
    }
}
