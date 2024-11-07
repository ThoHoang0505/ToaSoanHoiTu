<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    use HasFactory;
    protected $table = 'quyen';
    protected $primaryKey = 'MaQuyen';
    protected $fillable = ['TenQuyen', 'ChuThich'];
    public function chucVu()
    {
        return $this->belongsToMany(ChucVu::class, 'phanquyen', 'MaQuyen_PhanQuyen', 'ChucVu_PhanQuyen');
    }
}

