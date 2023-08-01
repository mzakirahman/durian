<?php

namespace App\Models;

use App\Models\sub_kriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class data_uji extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $table = 'pm_data_uji_alt';
    protected $primaryKey = 'id_data_uji';
    protected $fillable = ['nama_data_uji'];
    protected $dates = ['deleted_at'];

    public function value()
    {
        // $valu_dt = new value_data_uji;
        return $this->hasMany(value_data_uji::class,'id_data_uji','id_data_uji');
    }
    public function detail()
    {
        // $valu_dt = new value_data_uji;
        return $this->hasOne(pm_detail_data_uji::class,'id_data_uji','id_data_uji');
    }
    public function nilai_akhir()
    {
        // $valu_dt = new value_data_uji;
        return $this->hasMany(nilai_akhir::class,'id_data_uji','id_data_uji');
    }

}





