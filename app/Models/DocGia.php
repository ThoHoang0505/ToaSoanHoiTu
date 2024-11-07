<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocGia extends Model
{
    protected $table = 'docgia';
    protected $primaryKey = 'MaDG';
    protected $fillable = [
        'TenDG',
        'Email',
        'NgaySinh', 
        'SDT',    
        'DiaChi',  
        'GioiTinh', 
        'MaTK_DG',  
    ];
    public $timestamps = false; 
    public function taikhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'MaTK_DG', 'MaTK');
    }
}
