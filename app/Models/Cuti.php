<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuti extends Model
{
    //
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cuti';
    protected $fillable = ['karyawan_id', 'jenis_cuti', 'mulai', 'selesai', 'status'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}