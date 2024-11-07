<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bophan extends Model
{
    use HasFactory;
    protected $table = 'bophan';
    protected $fillable = [
        'TenBP',
    ];
    protected $primaryKey = 'MaBP';
    public $timestamps = false;
}
