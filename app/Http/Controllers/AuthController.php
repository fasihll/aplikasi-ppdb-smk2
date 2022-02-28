<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = User::where('email', $request->email)->first();
        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                session([
                    'berhasil_login' => true,
                    'name' => $data->name,
                    'level' => $data->id_level,
                    'id_user' => $data->id
                ]);
                return redirect()->route('dashboard')->with('message', 'Selamat Datang ' . $data->name . '');
            }
            return back()->with('message', 'Password salah');
        }
        return back()->with('message', 'Email Tidak Terdaftar');
    }
    public function register()
    {
        return view('register');
    }
    public function daftar(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password2' => 'required|same:password2'
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        User::insert($data);
        return redirect()->route('login')->with('message', 'Silahkan Login');
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
