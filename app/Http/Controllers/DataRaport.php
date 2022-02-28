<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RaportModel;

class DataRaport extends Controller
{
    public function __construct()
    {
        $this->RaportModel = new RaportModel();
    }
    public function index()
    {
        $data = [
            'raport' => DB::table('raport')
                ->join('users', 'users.id', '=', 'raport.id_user')
                ->select('users.id', 'users.name', DB::raw('COUNT(raport.id_mapel) as jumlah_mapel'))
                ->groupBy('raport.id_user')
                ->get(),
        ];
        return view('backend.dataRaport', $data);
    }
    public function detail($id)
    {
        $data = [
            'mapel' => DB::table('mapel')->get(),
            'raport' => DB::table('raport')->join('mapel', 'mapel.id_mapel', '=', 'raport.id_mapel')->where('id_user', $id)->get(),
            'row' => DB::table('raport')->where('id_user', $id)->count()
        ];
        return view('backend.detailRaport', $data);
    }
    public function edit(Request $request, $id)
    {
        $data = [
            'mapel' => DB::table('mapel')->get(),
            'raport' => DB::table('raport')->join('mapel', 'mapel.id_mapel', '=', 'raport.id_mapel')->where('id_user', $id)->get(),
            'row' => DB::table('raport')->where('id_user', $id)->count(),
            'id_user' => $id
        ];
        return view('backend.editRaport', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "Matematika1" => 'required',
            "BHS_inggris1" => 'required',
            "Bhs_indonesia1" => 'required',
            "Pendidikan_Agama1" => 'required',
            "PPKN1" => 'required',
            "Matematika2" => 'required',
            "BHS_inggris2" => 'required',
            "Bhs_indonesia2" => 'required',
            "Pendidikan_Agama2" => 'required',
            "PPKN2" => 'required',
            "Matematika3" => 'required',
            "BHS_inggris3" => 'required',
            "Bhs_indonesia3" => 'required',
            "Pendidikan_Agama3" => 'required',
            "PPKN3" => 'required',
            "Matematika4" => 'required',
            "BHS_inggris4" => 'required',
            "Bhs_indonesia4" => 'required',
            "Pendidikan_Agama4" => 'required',
            "PPKN4" => 'required',
            "Matematika5" => 'required',
            "BHS_inggris5" => 'required',
            "Bhs_indonesia5" => 'required',
            "Pendidikan_Agama5" => 'required',
            "PPKN5" => 'required',
        ]);
        $data = [
            [
                "id_mapel" => '1',
                "semester1" => $request->Matematika1,
                "semester2" => $request->Matematika2,
                "semester3" => $request->Matematika3,
                "semester4" => $request->Matematika4,
                "semester5" => $request->Matematika5,
            ],
            [
                "id_mapel" => '2',
                "semester1" => $request->BHS_inggris1,
                "semester2" => $request->BHS_inggris2,
                "semester3" => $request->BHS_inggris3,
                "semester4" => $request->BHS_inggris4,
                "semester5" => $request->BHS_inggris5,
            ],
            [
                "id_mapel" => '3',
                "semester1" => $request->Bhs_indonesia1,
                "semester2" => $request->Bhs_indonesia2,
                "semester3" => $request->Bhs_indonesia3,
                "semester4" => $request->Bhs_indonesia4,
                "semester5" => $request->Bhs_indonesia5,
            ],
            [
                "id_mapel" => '4',
                "semester1" => $request->Pendidikan_Agama1,
                "semester2" => $request->Pendidikan_Agama2,
                "semester3" => $request->Pendidikan_Agama3,
                "semester4" => $request->Pendidikan_Agama4,
                "semester5" => $request->Pendidikan_Agama5,
            ],
            [
                "id_mapel" => '5',
                "semester1" => $request->PPKN1,
                "semester2" => $request->PPKN2,
                "semester3" => $request->PPKN3,
                "semester4" => $request->PPKN4,
                "semester5" => $request->PPKN5,
            ]
        ];
        foreach ($data as $d => $data) {
            DB::table('raport')->where('id_user', $id)->where('id_mapel', $data['id_mapel'])->update($data);
        }
        return redirect()->route('dataRaport')->with('message', 'Data Berhasil Di update!');
    }
    public function delete($id)
    {
        DB::table('raport')->where('id_user', $id)->delete();
        return redirect()->route('dataRaport')->with('message', 'Data Berhasil Di Hapus!');
    }
}
