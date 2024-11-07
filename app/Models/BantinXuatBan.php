<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BantinXuatBan extends Model
{
    use HasFactory;
    protected $table = 'bantinxuatban';
    protected $primaryKey = 'MaBT_XB';
    public $timestamps = false;
    protected $fillable = [
        'TieuDeBT_XB',
        'LoaiBT_XB',
        'NoiDungBT_XB',
        'AnhDaiDien_XB',
        'NgayXuatBan',
        'TenPhongVien_XB',
        'TenBienTapVien_XB',
        'TenKiemDuyetVien',
        'MaKDV',
        'MaBTHT_XB',
        'MaBTBT_XB',
        'LuotXem'
    ];
    public function loaiTin()
    {
        return $this->belongsTo(LoaiTin::class, 'LoaiBT_XB', 'MaLT');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'MaBT_XB', 'MaBT_XB');
    }
    
}

