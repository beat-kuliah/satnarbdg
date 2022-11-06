<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function penyidik()
    {
        $penyidik = User::where('penyidik', '=', 1)->get();

        $data = [
            'penyidik' => $penyidik,
        ];

        return view('anggota.index', $data);
    }
}
