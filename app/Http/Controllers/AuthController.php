<?php

namespace App\Http\Controllers;

use App\Models\Legalisasi;
use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function proses_login(Request $request)
    {
        $input = $request->all();

        request()->validate(
            [
                'nim' => 'required',
                'password' => 'required',
            ],
            [
                'nim.required' => 'Nim Tidak Boleh Kosong',
                'password.required' => 'Password Tidak Boleh Kosong'
            ]
        );
        $nim = $request->nim;
        $password = $request->password;
        $credential = (is_numeric($nim)) ? 'nim' : 'name';
        if ($credential == 'nim') {
            if (Auth::attempt(['nim' => $nim, 'password' => $password])) {
                $request->session()->regenerate();
                $user = Auth::user();
                if ($user->role == 'admin') {
                    return redirect()->intended('dashboard');
                } else if ($user->role == 'user') {
                    return redirect()->intended('home');
                }
                return redirect()->intended('/');
            }
        } else {
            if (Auth::attempt(['name' => $nim, 'password' => $password])) {
                $request->session()->regenerate();
                $user = Auth::user();
                if ($user->role == 'admin') {
                    return redirect()->intended('dashboard');
                } else if ($user->role == 'user') {
                    return redirect()->intended('home');
                }
                return redirect()->intended('/');
            }
        }
        return back()->withErrors([
            'nim' => 'Maaf nim dan password anda salah',
        ])->onlyInput('nim');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function proses_register(Request $request)
    {
        request()->validate(
            [
                'nim' => 'required|unique:users|min:8|max:10',
                'nama' => 'required',
                'password1' => 'required|min:5',
                'password2' => 'required|same:password1',
            ],
            [
                'nim.required' => 'Nim Harus Diisi',
                'nim.unique' => 'Tidak Dapat Membuat Akun Karena Nim Sudah Ada',
                'nim.min' => 'Nim Minimal 8 angka',
                'nim.max' => 'Nim Minimal 10 angka',
                'nama.required' => 'Nama Harus Diisi',
                'password1.required' => 'Password Harus Diisi',
                'password1.min' => 'Password Minimal 5 Karakter',
                'password2.required' => 'Konfirmasi Password Harus Diisi',
                'password2.same' => 'Password dan Konfirmasi Password Tidak Sama',
            ]
        );

        $user = new User([
            'name' => $request->nama,
            'nim' => $request->nim,
            'role' => 'user',
            'password' => bcrypt($request->password1),
        ]);
        $user->save();
        return redirect()->route('login')->with('success', 'Berhasil Mendaftar');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
