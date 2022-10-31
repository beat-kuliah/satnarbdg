<?php

namespace App\Http\Controllers;

use App\Models\Tahanan;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class TahananController extends Controller
{
    public function index()
    {
        $cek = Tahanan::all()->count();
        $tahanan = [];
        if($cek != 0){
            $tahanan = Tahanan::all()->where('diff', '<=', 60);
        };
        $penyidik = User::get()->where('penyidik', '!=', null);

        $data = [
            'tahanan' => $tahanan,
            'penyidik' => $penyidik
        ];

        return view('kontrol_tahanan.index', $data);
    }

    public function store(Request $req)
    {
        $keluar = date('Y-m-d', strtotime('+60 days', strtotime($req->masuk)));
        $data = [
            'nik' => $req->identitas,
            'tkp' => $req->tkp,
            'alamat' => $req->pasal,
            'name' => $req->nama,
            'umur' => $req->umur,
            'pasal' => $req->pasal,
            'masuk' => Carbon::now(),
            'keluar' => Carbon::now(),
            'penyidik' => $req->penyidik,
            'masuk' => $req->masuk,
            'keluar' => $keluar,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        DB::table('tahanan')->insert($data);
        DB::commit();

        return 'test';
    }

    public function getTahanan()
    {
        $cek = Tahanan::all()->count();
        $tahanan = [];
        if($cek != 0){
            $tahanan = Tahanan::all()->where('diff', '<=', 60);
        };

        return response()->json($tahanan, 200);
    }

    public function postTahanan(Request $req)
    {
        $keluar = date('Y-m-d', strtotime('+60 days', strtotime($req->date)));
        $data = [
            'nik' => $req->identitas,
            'tkp' => $req->tkp,
            'alamat' => $req->alamat,
            'name' => $req->nama,
            'umur' => $req->umur,
            'pasal' => $req->pasal,
            'masuk' => Carbon::now(),
            'keluar' => Carbon::now(),
            'penyidik' => 1,
            'masuk' => $req->date,
            'keluar' => $keluar,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        DB::table('tahanan')->insert($data);
        DB::commit();
        
        return 'success';
    }

    public function getPenyidik()
    {
        $penyidik = DB::select(
            'select *
            from users
            where penyidik is not null'
        );

        return response()->json($penyidik, 200);
    }
}
