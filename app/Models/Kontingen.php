<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontingen extends Model
{
    use HasFactory;
    protected $table = 'kontingens';
    protected $guarded = [];
    // protected $fillable = ['name'];
    /**
     * Get the atlet associated with the Kontingen
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function atlet()
    {
        return $this->hasOne(Atlet::class, 'kontingen_id', 'id');
    }
    public function jadwals()
    {
        return $this->belongsTo(Jadwal::class, 'id', 'kontingen_id');
    }
    /**
     * Get the hasils associated with the Kontingen
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hasils()
    {
        return $this->hasOne(Hasil::class, 'kontingen_id', 'id');
    }
}
