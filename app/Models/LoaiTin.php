<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table = 'loaitin';
    protected $primaryKey = 'MaLT';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'TenLT',
        'MaCM_LT',
    ];
    public function bantinXuatBan()
    {
        return $this->hasMany(BantinXuatBan::class, 'LoaiBT_XB', 'MaLT');
    }
    public function chuyenMuc()
    {
        return $this->belongsTo(ChuyenMuc::class, 'MaCM_LT', 'MaCM');
    }
}

