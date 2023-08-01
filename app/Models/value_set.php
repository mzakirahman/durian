<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class value_set extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $table = 'kriteria_value_set';
    protected $primaryKey = 'id_value_set';
    protected $fillable = ['id_kriteria','keterangan_value','value'];
    protected $dates = ['deleted_at'];
}
