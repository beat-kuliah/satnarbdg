<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Tahanan extends Model
{
    use HasFactory;

    protected $table = 'tahanan';
    
    protected $primaryKey = 'id';

    protected $appends = [
        'diff',
    ];

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
        'penyidik',
    ];

    public function sidik(){
        return $this->belongsTo(User::class, 'penyidik', 'id');
    }

    public function getDiffAttribute()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date1=date_create($this->keluar);
        $date2=date_create(date('Y-m-d'));
        $diff=date_diff($date1,$date2);
        return $diff->format("%a");
    }

    public function getPenyidikAttribute($value)
    {
        return User::find($value);
    }
}
