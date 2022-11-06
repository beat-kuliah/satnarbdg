<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    use HasFactory;

    protected $table = 'lampiran';
    
    protected $primaryKey = 'id';

    protected $appends = [
        'foto',
    ];

    protected $fillable = [
        'hasil_kegiatan',
    ];

    public function getFotoAttribute()
    {
        return FotoLampiran::where('lampiran_id', '=', $this->id)->get();
    }
}
