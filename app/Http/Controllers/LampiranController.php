<?php

namespace App\Http\Controllers;

use App\Models\FotoLampiran;
use App\Models\Lampiran;
use App\Models\Rencana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class LampiranController extends Controller
{
    public function index()
    {
        $lampiran = Lampiran::all();
        $rencana = Rencana::all();

        $data = [
            'lampiran' => $lampiran,
            'rencana' => $rencana,
        ];

        return view('lampiran_kegiatan.index', $data);
    }

    public function store(Request $req)
    {
        $data = [
            'rencana_id' => $req->name,
            'hasil_kegiatan' => $req->hasil,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        $id = DB::table('lampiran')->insertGetId($data);
        
        $foto = $req->file('foto');

        foreach ($foto as $f){
            $path_foto = Storage::put('tahanan', $f);

            DB::table('foto_lampiran')->insert([
                'lampiran_id' => $id,
                'foto' => $path_foto,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        DB::commit();

        return 'success';
    }

    public function edit($id)
    {
        $lampiran = Lampiran::find($id);
        $rencana = Rencana::all();

        $data = [
            'lampiran' => $lampiran,
            'rencana' => $rencana,
        ];

        return view('lampiran_kegiatan.edit', $data);
    }

    public function update(Request $req)
    {
        $id = $req->id;
        $lampiran = DB::table('lampiran')->where('id', $req->id);
        $foto = $req->file('foto');

        if($req->name != null)
            $lampiran->update(['rencana_id' => $req->name]);

        if($req->hasil != null)
            $lampiran->update(['hasil_kegiatan' => $req->hasil]);

        if($foto != ''){
            foreach ($foto as $f){
                $path_foto = Storage::put('tahanan', $f);
    
                DB::table('foto_lampiran')->insert([
                    'lampiran_id' => $id,
                    'foto' => $path_foto,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
        DB::commit();

        return $id;
    }

    public function destroy($id)
    {
        $lampiran = FotoLampiran::find($id)->lampiran_id;

        FotoLampiran::find($id)->delete();

        return $lampiran;
    }
}
