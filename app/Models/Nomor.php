<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomor extends Model
{
    use HasFactory;
    protected $table = 'nomors';
    protected $guarded= [];
    // protected $fillable = ['name','cabor_id'];

    /**
     * Get the cabor that owns the Nomor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    //  relasi nomor ke cabor
    public function cabor()
    {
        // karena di Cabor sudah didefinisikan hasOne berarti di nomor pakai belongsTo
        // belongsTo(relasi tabel, foreignKey, primaryKey)
        // posisi sama sperti di cabor 
        // nek misal tipe array perlu tag [] setiap kolom benerr ngene salah duduk nang model e
        return $this->belongsTo(Cabor::class, 'cabor_id', 'id');
    }
}
