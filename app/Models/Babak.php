<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Babak extends Model
{
    use HasFactory;
    protected $table = 'babaks';
    protected $guarded= [];
    /**
     * Get the jadwal that owns the Atlet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jadwal()
    {
        return $this->hasOne(Jadwal::class, 'babak_id', 'id');
    }
    /**
     * Get the hasils associated with the Babak
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hasils()
    {
        return $this->hasOne(Hasil::class, 'babak_id', 'id');
    }
}
