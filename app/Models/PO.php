<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PO extends Model
{
    use HasFactory;
    protected $table = 'pos';
    public $timestamps = false;

    public function items()
    {
        return $this->hasMany(PosDetail::class, 'id');
    }
}