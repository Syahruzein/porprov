<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtletJadwal extends Model
{
    use HasFactory;
    public $table = 'atlet_jadwals';
    public $primaryKey = 'id';

    /**
     * Get the atlet that owns the AtletJadwal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function atlets()
    {
        return $this->belongsTo(Atlet::class, 'atlet_id', 'id');
    }
    public function jadwals()
    {
        return $this->belongsToMany(Jadwal::class, 'jadwal_id', 'id');
    }
}
