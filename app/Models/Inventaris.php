<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $table = 'inventaris';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'code',
        'name',
        'jumlah',
        'kondisi',
        'foto',
        'keterangan'
    ];

    public function getKondisiAttribute($value)
    {
        $result = $value == 0 ? 'Baik' : 'Rusak';

        return $result;
    }
}
