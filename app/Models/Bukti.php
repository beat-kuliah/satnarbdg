<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    use HasFactory;

    protected $table = 'bukti';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'penyidik',
        'diberikan'
    ];

    public function getPenyidikAttribute($value)
    {
        return User::find($value);
    }
}
