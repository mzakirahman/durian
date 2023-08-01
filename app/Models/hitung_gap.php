<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hitung_gap extends Model
{
     use SoftDeletes;
    protected $table = 'pm_pemetaan_gap';
    protected $primaryKey = 'id_pemetaan_gap';
    protected $fillable = ['id_hitung','id_data_uji','id_kriteria','nilai_gap'];
    protected $dates = ['deleted_at'];

    public function hitung()
    {   
        return $this->belongsTo(hitung::class);
    }
    public function kriteria()
    {   
        return $this->belongsTo(kriteria::class,'id_kriteria');
    }
}