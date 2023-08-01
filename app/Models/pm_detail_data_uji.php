<?php

namespace App\Models;
use App\Models\data_uji;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pm_detail_data_uji extends Model
{
     use SoftDeletes;
    protected $table = 'pm_detail_data_uji';
    protected $primaryKey = 'id_detail_data_uji';
    protected $fillable = ['id_data_uji','img','ket_detail_data_uji'];
    protected $dates = ['deleted_at'];

    public function data_uji()
    {   
        return $this->belongsTo(data_uji::class,'id_data_uji','id_data_uji');
    }
}
