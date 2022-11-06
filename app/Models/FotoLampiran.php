<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoLampiran extends Model
{
    use HasFactory;

    protected $table = 'foto_lampiran';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'lampiran_id',
        'foto',
    ];
}
