<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hitung_selisih extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $table = 'pm_hitung_selisih';
    protected $primaryKey = 'id_hitung_selisih';
    protected $fillable = ['id_hitung','id_data_uji','id_kriteria','nilai_selisih'];
    protected $dates = ['deleted_at'];

    public function hitung()
    {   
        return $this->belongsTo(hitung::class);
    }

}