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
        'name',
        'jenis',
    ];

    protected $appends = [
        'surat',
        'anggota',
    ];

    public function getJenisAttribute($value)
    {
        $result = $value == 0 ? 'Biasa' : 'Khusus';

        return $result;
    }

    public function getAnggotaAttribute()
    {
        return AnggotaRencana::where('rencana_id', '=', $this->id)->get();
    }

    public function getSuratAttribute()
    {
        return SuratTugas::where('rencana_id', '=', $this->id)->get();
    }
}
