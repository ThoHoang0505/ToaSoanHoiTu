<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['MaBT_XB', 'MaTK_DG', 'NoiDung', 'TrangThai'];
    protected $table = 'comments';
    protected $primaryKey = 'id';
    public function baiviet()
    {
        return $this->belongsTo(BantinXuatBan::class, 'MaBT_XB', 'MaBT_XB');
    }
    public function taikhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'MaTK_DG');
    }
    public function user()
    {
        return $this->belongsTo(TaiKhoan::class, 'MaTK_DG', 'MaTK');
    }
}
