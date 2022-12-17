<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $data['profile'] = DB::table('profile')->get();
        $data['title'] = "Profile";

        return view('VProfile', $data);
    }

    public function tambah(Request $request)
    {
        DB::table('profile')->insert([
            'kd_profile' => $request->kd_profile,
            'nama_profile' => $request->nama_profile,

        ]);
        // alihkan halaman ke halaman profile
        return redirect('/profile');
 
    }

    public function hapus(Request $request)
    {
        $kd_profile=$request->kd_profile;
        DB::table('profile')->where('kd_profile',$kd_profile)->delete();

        // alihkan halaman ke halaman profile
        return redirect('/profile');
 
    }

    public function edit(Request $request)
    {
        DB::table('profile')->where('kd_profile',$request->kd_profile)->update([
        
            'nama_profile' => $request->nama_profile,

        ]);
        // alihkan halaman ke halaman profile
        return redirect('/profile');
 
    }
}
