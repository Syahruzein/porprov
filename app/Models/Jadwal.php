<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwals';
    protected $guarded = [];

    /**
     * The atlet that belong to the Jadwal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function atlet()
    {
        // jadwal_atlet
        return $this->belongsToMany(Atlet::class);
    }
    /**
     * Get the babak that owns the Atlet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function babak()
    {
        return $this->belongsTo(Babak::class, 'babak_id', 'id');
    }
    public function atlet_jadwals()
    {
        return $this->hasMany(AtletJadwal::class, 'jadwal_id', 'id');
    }
    public function cabors()
    {
        return $this->hasOne(Cabor::class, 'id', 'cabor_id');
    }
    public function kontingens()
    {
        return $this->hasOne(Kontingen::class, 'id', 'kontingen_id');
    }
    public function nomors()
    {
        return $this->hasOne(Nomor::class, 'id', 'nomor_id');
    }
}
