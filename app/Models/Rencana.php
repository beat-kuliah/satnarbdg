<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rencana extends Model
{
    use HasFactory;

    protected $table = 'rencana';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'surat_tugas',
        'name',
        'jenis',
        'anggota'
    ];

    public function getJenisAttribute($value)
    {
        $result = $value == 0 ? 'Biasa' : 'Khusus';

        return $result;
    }

    public function getAnggotaAttribute($value)
    {
        return User::find($value);
    }
}
