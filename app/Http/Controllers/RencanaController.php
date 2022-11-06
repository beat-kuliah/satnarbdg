<?php

namespace App\Http\Controllers;

use App\Models\Rencana;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
        $foto = $req->file('foto');
        $name_foto = Carbon::now()->format('YmdHisu') . '_' . $foto->getClientOriginalName();
        $path_foto = Storage::put('images', $foto);

        $file = $req->file('surat');
        $name_file = Carbon::now()->format('YmdHisu') . '_' . $file->getClientOriginalName();
        $path_file = Storage::put('surat', $file);

        $data = [
            'surat_tugas' => $path_file,
            'name' => $req->name,
            'jenis' => $req->jenis,
            'anggota' => $req->anggota,
            'foto' => $path_foto,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        DB::table('rencana')->insert($data);
        DB::commit();

        return 'success';
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

        if ($req->surat != null)
            $rencana->update(['surat_tugas' => true]);

        if ($req->name != null)
            $rencana->update(['name' => $req->name]);

        if ($req->jenis != null)
            $rencana->update(['jenis' => $req->jenis]);

        if ($req->anggota != null)
            $rencana->update(['anggota' => $req->anggota]);

        if ($req->foto != null)
            $rencana->update(['foto' => true]);

        return 'success';
    }
}
