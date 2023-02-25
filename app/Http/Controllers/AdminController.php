<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Harga;
use App\Models\Legalisasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;

class AdminController extends Controller
{
    public function index()
    {
        $mahasiswa = User::where('role', 'user')->count();
        $diterima = Legalisasi::where('is_confirm', 1)->count();
        $belum_diterima = Legalisasi::where('is_confirm', 0)->where('is_upload', 1)->count();
        $belum_ada_bukti = Legalisasi::where('is_upload', 0)->count();
        return view('dashboard.admin.index')->with([
            'user' => Auth::user(),
            'mahasiswa' => $mahasiswa,
            'diterima' => $diterima,
            'belum_diterima' => $belum_diterima,
            'belum_ada_bukti' => $belum_ada_bukti,
        ]);
    }

    public function legalisasi()
    {
        $data = Legalisasi::where('is_upload', 1)->get();
        return view('dashboard.admin.legalisasi_view', compact(['data']))->with([
            'user' => Auth::user(),
        ]);
    }
    public function legalisasi_nbukti()
    {
        $data = Legalisasi::where('is_upload', 0)->get();
        return view('dashboard.admin.legalisasi_BBukti', compact(['data']))->with([
            'user' => Auth::user(),
        ]);
    }

    public function lihat_bukti(Request $request)
    {
        $url = $request->urlbukti;

        return '<img src="' . asset('storage/' . $url) . '"  width="1000" height="1200" alt="">';
    }

    public function update_konfirmasi(Request $request)
    {
        $id = $request->id;

        $legalisasi = Legalisasi::find($id);
        $legalisasi->is_confirm = 1;
        $legalisasi->save();

        $request->session()->flash('msg', "Berhasil DiKonfirmasi");
        return back()->withErrors([
            'Form' => 'Maaf form tidak boleh ada yang kosong',
        ]);
        return redirect('/legalisasi');
    }
    public function lihat_profile()
    {
        return view('dashboard.admin.profile_admin')->with([
            'user' => Auth::user(),
        ]);
    }

    public function update_profile(Request $request)
    {
        $id = $request->id;

        $request->validate(
            [
                'profile' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',

            ],
            [
                'profile.required' => 'File Tidak Boleh Kosong',
                'profile.max' => 'File Tidak Boleh Lebih Dari 2MB',
                'profile.mimes' => 'Format File Harus JPG,PNG,PDF',
            ]
        );

        if ($request->hasFile('profile')) {
            $path = $request->file('profile')->store('profiles');
        } else {
            $path = '';
        }

        $users = User::find($id);
        $pathFile = $users->profile;

        if ($pathFile != null || $pathFile != '') {
            if ($pathFile != 'profiles/default.jpg') {
                Storage::delete($pathFile);
            }
        }
        $users->profile = $path;
        $users->save();

        $request->session()->flash('msg', "Berhasil Update Profile");
        return back()->withErrors([
            'Form' => 'Maaf file tidak boleh ada yang kosong',
        ]);
        return redirect('/legalisasi');
    }

    public function hapus_profile($id)
    {
        $path = 'profiles/default.jpg';

        $users = User::find($id);
        $pathFile = $users->profile;
        if ($pathFile != null || $pathFile != '') {
            if ($pathFile != 'profiles/default.jpg') {
                Storage::delete($pathFile);
            }
        }
        $users->profile = $path;
        $users->save();

        return redirect('/profile');
    }

    public function view_pengaturan()
    {
        $harga = Harga::all();
        $almat = Alamat::find(1)->first();
        return view('dashboard.admin.pengaturan', compact('harga'))->with([
            'user' => Auth::user(),
            'almat' => $almat
        ]);
    }

    public function view_getHarga(Request $request)
    {
        $data = Harga::where('id', $request->id)->first();
        return response()->json($data);
    }

    public function update_harga(Request $request)
    {
        $id = $request->id;
        $harga = Harga::find($id);
        $harga->harga_perlembar = $request->price;
        $harga->save();

        $request->session()->flash('msg', "Berhasil Update Harga");
        return redirect('/pengaturan');
    }
    public function update_alamat(Request $request)
    {
        $id = $request->idAlamat;
        $alamat = Alamat::find($id);
        $alamat->fakultas_univ = $request->fakultas;
        $alamat->alamat = $request->alamat;
        $alamat->nomor_telepon = $request->nomor;
        $alamat->email = $request->email;
        $alamat->save();

        $request->session()->flash('msg', "Berhasil Update Alamat");
        return redirect('/pengaturan');
    }
}
