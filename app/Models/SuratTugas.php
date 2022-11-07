<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTugas extends Model
{
    use HasFactory;

    protected $table = 'surat_tugas';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'rencana_id',
        'surat',
    ];
}
