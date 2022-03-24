<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUsaha extends Model
{
    use HasFactory;
    protected $table        = 'jenis_usaha';
    protected $primaryKey   = 'jenis_usaha_id';
    protected $guarded      = [];
}
