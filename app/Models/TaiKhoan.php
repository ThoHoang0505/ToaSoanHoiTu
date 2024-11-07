<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class TaiKhoan extends Authenticatable
{
    use HasFactory;

    protected $table = 'taikhoan';
    protected $primaryKey = 'MaTK';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'TenDangNhap',
        'MatKhau',
        'Quyen',
    ];

    public function nhanvien()
    {
        return $this->hasOne(NhanVien::class, 'MaTK_NV', 'MaTK');
    }
    public function docgia()
    {
        return $this->hasOne(DocGia::class, 'MaTK_DG', 'MaTK');
    }
}
