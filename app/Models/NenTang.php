<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NenTang extends Model
{
    protected $table = 'nentang';
    protected $primaryKey = 'MaNT';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['MaNT', 'TenNenTang'];
}
