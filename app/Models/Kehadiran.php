<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kehadiran extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'kehadiran';
    
    protected $fillable = [
        'id',
        'karyawan_id',
        'check_in',
        'check_out',
        'date', 
        'status'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}