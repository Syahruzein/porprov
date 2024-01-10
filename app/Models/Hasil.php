<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = 'hasils';
    protected $guarded = '';
    /**
     * Get the atlets that owns the Hasil
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function atlets()
    {
        return $this->belongsTo(Atlet::class, 'atlet_id', 'id');
    }
    /**
     * Get the babak that owns the Hasil
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function babak()
    {
        return $this->belongsTo(Babak::class, 'babak_id', 'id');
    }
    /**
     * Get the cabors that owns the Hasil
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cabors()
    {
        return $this->belongsTo(Cabor::class, 'cabor_id', 'id');
    }
    /**
     * Get the kontingens that owns the Hasil
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kontingens()
    {
        return $this->belongsTo(Kontingen::class, 'kontingen_id', 'id');
    }
    /**
     * Get the medalis that owns the Hasil
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medalis()
    {
        return $this->belongsTo(Medali::class, 'medali_id', 'id');
    }
    /**
     * Get the nomors that owns the Hasil
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nomors()
    {
        return $this->belongsTo(Nomor::class, 'nomor_id', 'id');
    }
}
