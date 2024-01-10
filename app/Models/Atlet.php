<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atlet extends Model
{
    use HasFactory;
    protected $table = 'atlets';
    protected $guarded = [];
    /**
     * Get the cabor that owns the Atlet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cabor()
    {
        return $this->belongsTo(Cabor::class, 'cabor_id', 'id');
    }
    /**
     * Get the user that owns the Atlet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kontingen()
    {
        return $this->belongsTo(Kontingen::class, 'kontingen_id', 'id');
    }
    /**
     * Get the nomor that owns the Atlet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nomor()
    {
        return $this->belongsTo(Nomor::class, 'nomor_id', 'id');
    }
    /**
     * The jadwal that belong to the Atlet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function jadwal()
    {
        return $this->belongsToMany(Jadwal::class);
    }
    public function atlet_jadwals()
    {
        return $this->hasMany(AtletJadwal::class, 'atlet_id', 'id');
    }
    /**
     * Get the hasils associated with the Atlet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hasils()
    {
        return $this->hasOne(Hasil::class, 'atlet_id', 'id');
    }
}
