<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class value_data_uji extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $table = 'pm_value_data_uji';
    protected $primaryKey = 'id_value_data_uji';
    protected $fillable = ['id_data_uji','id_kriteria','nilai_data_uji'];
    protected $dates = ['deleted_at'];

    public function data_uji()
    {   
        return $this->belongsTo(data_uji::class);
    }

    public function kriteria()
    {   
        return $this->belongsTo(kriteria::class,'id_kriteria');
    }
}