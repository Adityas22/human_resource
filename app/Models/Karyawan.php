<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    //
    use HasFactory;
    use SoftDeletes;

    protected $table = 'karyawan'; //karena nama tabel karyawan dimana biasakan pake s diakhri "karyawans atau empoyees" untuuk nama tabel database

    protected $fillable = [
        'nama',
        'email',
        'nomor_hp',
        'alamat',
        'tgl_lahir',
        'tgl_rekrutment',
        'departemen_id',
        'roles_id',
        'status',
        'gaji'
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }
    

    
}