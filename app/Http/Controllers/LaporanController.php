<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LaporanModel;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->LaporanModel = new LaporanModel();
    }
    public function index()
    {
        $data = [
            'rata_rata' => $this->LaporanModel->getRataRata()
        ];
        return view('backend.laporan', $data);
    }
}
