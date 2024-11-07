<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhanvien';
    protected $primaryKey = 'MaNV';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'TenNV',
        'MaCV_VN',
        'DiaChi_NV',
        'SoDT_NV',
        'NgaySinh_NV',
        'Email_NV',
        'CCCD_NV',
        'GioiTinh_NV',
        'MaTK_NV',
    ];
    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'MaTK_NV', 'MaTK');
    }
}
