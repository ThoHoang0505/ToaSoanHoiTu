<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanTinHienTruong extends Model
{
    use HasFactory;
    protected $table = 'bantinhientruong';
    protected $primaryKey = 'MaBT_HT';
    protected $fillable = [
        'TieuDeBT_HT',
        'LoaiBT_HT',
        'NoiDungBT_HT',
        'AnhDaiDien_HT',
        'NgayDang_HT',
        'TenPhongVien',
        'MaNV_PV',
        'TrangThai'
    ];
    public $timestamps = false;
    public function loaiTin()
    {
        return $this->belongsTo(LoaiTin::class, 'LoaiBT_HT', 'MaLT');
    }
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNV_PV', 'MaNV');
    }
}

