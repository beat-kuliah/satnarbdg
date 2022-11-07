<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaRencana extends Model
{
    use HasFactory;

    protected $table = 'anggota_rencana';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'rencana_id',
        'anggota_id',
    ];

    protected $appends = [
        'anggota',
    ];

    public function getAnggotaAttribute()
    {
        return User::find($this->anggota_id);
    }
}
