<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontingen extends Model
{
    use HasFactory;
    protected $table = 'kontingens';
    protected $fillable = ['name'];
}
