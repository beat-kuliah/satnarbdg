<?php

namespace App\Http\Controllers;

use App\Models\Bukti;
use Illuminate\Http\Request;

class BuktiController extends Controller
{
    public function index()
    {
        $inventaris = Bukti::all();

        $data = [
            'inventaris' => $inventaris,
        ];

        return view('barang_bukti.index', $data);
    }

    public function store(Request $req)
    {
        //
    }
}
