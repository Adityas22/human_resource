<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Karyawan;

class Payroll extends Model
{
    //
    use HasFactory;
    use SoftDeletes;
    protected $table = 'payroll';
    protected $fillable = 
    [
        'karyawan_id',
        'gaji',
        'bonus',
        'potongan',
        'gaji_bersih',
        'tgl_pembayaran',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}