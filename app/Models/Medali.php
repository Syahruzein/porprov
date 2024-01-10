<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medali extends Model
{
    use HasFactory;
    protected $table = 'medalis';
    protected $guarded = '';
    /**
     * Get the hasils associated with the Medali
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hasils()
    {
        return $this->hasOne(Hasil::class, 'medali_id', 'id');
    }
}
