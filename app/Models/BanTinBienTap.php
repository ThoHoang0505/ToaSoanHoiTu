<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanTinBienTap extends Model
{
    use HasFactory;
    protected $table = 'bantinbientap';
    protected $primaryKey = 'MaBT_BT';
    protected $fillable = [
        'TieuDeBT_BT',
        'LoaiBT_BT',
        'NoiDungBT_BT',
        'AnhDaiDien_BT',
        'NgayBienTap',
        'TenPhongVien',
        'TenBienTapVien',
        'MaNV_BTV',
        'MaBTHT',
        'TrangThai',
        'PhienBan',
    ];
    public $timestamps = false;
    public function loaiTin()
    {
        return $this->belongsTo(LoaiTin::class, 'LoaiBT_BT', 'MaLT');
    }
    public function nhanVienBienTap()
    {
        return $this->belongsTo(NhanVien::class, 'MaNV_BTV', 'MaNV');
    }
    public function banTinHienTruong()
    {
        return $this->belongsTo(BanTinHienTruong::class, 'MaBTHT', 'MaBT_HT');
    }
}
