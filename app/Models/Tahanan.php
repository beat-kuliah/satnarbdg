<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahanan extends Model
{
    use HasFactory;

    protected $table = 'tahanan';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'nik',
        'name',
        'tkp',
        'alamat',
        'umur',
        'pasal',
        'foto',
        'masuk',
        'keluar',
        'penyidik'
    ];

    public function sidik(){
        return $this->belongsTo(User::class, 'penyidik', 'id');
    }
}
