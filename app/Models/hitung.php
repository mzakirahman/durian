<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hitung extends Model
{
    // use HasFactory;
     use SoftDeletes;
    protected $table = 'pm_hitung';
    protected $primaryKey = 'id_hitung';
    protected $fillable = ['kode_data'];
    protected $dates = ['deleted_at'];

    public function selisih()
    {
        return $this->hasMany(hitung_selisih::class,'id_hitung','id_hitung');
    }
    
    public function gap()
    {
        return $this->hasMany(hitung_gap::class,'id_hitung','id_hitung');
    }

    public function core()
    {
        return $this->hasMany(core_fk::class,'id_hitung','id_hitung');
    }

    public function secondary()
    {
        return $this->hasMany(secondary_fk::class,'id_hitung','id_hitung');
    }

    public function n_akhir()
    {
        return $this->hasMany(nilai_akhir::class,'id_hitung','id_hitung');
    }

}












