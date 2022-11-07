<?php

namespace App\Http\Controllers;

use App\Models\AnggotaRencana;
use App\Models\Rencana;
use App\Models\SuratTugas;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RencanaController extends Controller
{
    public function index()
    {
        $rencana = Rencana::all();
        $anggota = User::get()->where('penyidik', '!=', null);

        $data = [
            'rencana' => $rencana,
            'anggota' => $anggota,
        ];

        return view('rencana_kegiatan.index', $data);
    }

    public function store(Request $req)
    {
        $file = $req->file('surat');
        $anggota = $req->anggota;

        if ($file != '' && count($anggota) > 0) {
            $data = [
                'name' => $req->name,
                'jenis' => $req->jenis,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            $id = DB::table('rencana')->insertGetId($data);

            foreach ($anggota as $a) {
                DB::table('anggota_rencana')->insert([
                    'rencana_id' => $id,
                    'anggota_id' => $a
                ]);
            }

            foreach ($file as $f) {
                $path_file = Storage::put('surat', $f);
                DB::table('surat_tugas')->insert([
                    'rencana_id' => $id,
                    'surat' => $path_file
                ]);
            }

            DB::commit();

            return 'success';
        } else {
            return 'fail';
        }
    }

    public function edit($id)
    {
        $rencana = Rencana::find($id);
        $anggota = User::get()->where('penyidik', '!=', null);

        $data = [
            'rencana' => $rencana,
            'anggota' => $anggota
        ];

        return view('rencana_kegiatan.edit', $data);
    }

    public function update(Request $req)
    {
        $rencana = DB::table('rencana')->where('id', $req->id);

        if ($req->file('surat') != '') {
            SuratTugas::where('rencana_id', '=', $req->id)->delete();
            foreach($req->surat as $rs){
                $path_file = Storage::put('surat', $rs);
                DB::table('surat_tugas')->insert([
                    'rencana_id' => $req->id,
                    'surat' => $path_file
                ]);
            }
        }

        if ($req->name != null)
            $rencana->update(['name' => $req->name]);

        if ($req->jenis != null)
            $rencana->update(['jenis' => $req->jenis]);

        if (count($req->anggota) > 0) {
            AnggotaRencana::where('rencana_id', '=', $req->id)->delete();
            foreach ($req->anggota as $ra) {
                DB::table('anggota_rencana')->insert([
                    'rencana_id' => $req->id,
                    'anggota_id' => $ra
                ]);
            }
        }

        return 'success';
    }
}
