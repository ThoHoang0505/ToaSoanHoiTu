<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChuyenMuc extends Model
{
    protected $table = 'chuyenmuc';
    protected $primaryKey = 'MaCM';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'TenCM',
        'Icon'
    ];
    public function loaiTin()
    {
        return $this->hasMany(LoaiTin::class, 'MaCM_LT', 'MaCM');
    }
}