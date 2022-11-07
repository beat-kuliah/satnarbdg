<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::all();

        $data = [
            'inventaris' => $inventaris,
        ];

        return view('barang inventaris.index');
    }

    public function store(Request $req)
    {
        //
    }

    public function edit($id)
    {
        $inventaris = Inventaris::find($id);

        $data = [
            'inventaris' => $inventaris,
        ];

        return view('barang inventaris.edit', $data);
    }

    public function update(Request $req)
    {
        //
    }
}
