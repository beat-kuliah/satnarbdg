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
        $tahanan = DB::select('
        select tahanan.*,users.name as pname, DATEDIFF(tahanan.keluar, now()) as diff 
        from tahanan 
        join users on users.id = tahanan.penyidik
        where DATEDIFF(tahanan.keluar, tahanan.masuk) < 60');
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
}
