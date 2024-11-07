<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanQuyen extends Model
{
    use HasFactory;
    protected $table = 'phanquyen';
    protected $fillable = ['ChucVu_PhanQuyen', 'MaQuyen_PhanQuyen'];
    public $timestamps = false;
    public function chucVu()
    {
        return $this->belongsTo(ChucVu::class, 'ChucVu_PhanQuyen', 'MaCV');
    }
    public function quyen()
    {
        return $this->belongsTo(Quyen::class, 'MaQuyen_PhanQuyen', 'MaQuyen');
    }
}
