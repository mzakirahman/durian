<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kriteria extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $table = 'master_kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $fillable = ['kode_kriteria','nama_kriteria','bobot','faktor'];
    protected $dates = ['deleted_at'];

       public function value()
    {
        return $this->hasMany(value_set::class,'id_kriteria','id_kriteria');
    }

}
