<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bobot_selisih extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $table = 'master_pembobotan';
    protected $primaryKey = 'id_pembobotan';
    protected $fillable = ['selisih','nilai_pembobotan','ket_nilai_pembobotan'];
    protected $dates = ['deleted_at'];
}
