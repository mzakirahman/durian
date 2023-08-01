<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class nilai_akhir extends Model
{
     use SoftDeletes;
    protected $table = 'm_nilai_akhir';
    protected $primaryKey = 'id_nilai_akhir';
    protected $fillable = ['id_hitung','id_data_uji','nilai_nilai_akhir'];
    protected $dates = ['deleted_at'];

    public function hitung()
    {   
        return $this->belongsTo(hitung::class);
    }

    public function data_uji()
    {   
        return $this->belongsTo(data_uji::class,'id_data_uji','id_data_uji');
    }
}
