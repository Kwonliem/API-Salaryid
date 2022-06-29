<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $guarded = [];

    public function jabatan()
    {
        return $this->belongsTo('App\Jabatan', 'id_jabatan');
    }
}
