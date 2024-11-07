<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;
    protected $table = 'chucvu';
    protected $primaryKey = 'MaCV';
    protected $fillable = [
        'TenChucVu',
        'MaBP_CV',
    ];
    public $timestamps = false;
    public function phanQuyen()
    {
        return $this->hasMany(PhanQuyen::class, 'ChucVu_PhanQuyen', 'MaCV');
    }
    public function quyen()
    {
        return $this->belongsToMany(Quyen::class, 'phanquyen', 'ChucVu_PhanQuyen', 'MaQuyen_PhanQuyen');
    }
    public function bophan()
    {
        return $this->belongsTo(BoPhan::class, 'MaBP_CV', 'MaBP');
    }
}
