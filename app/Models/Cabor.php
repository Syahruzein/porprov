<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabor extends Model
{
    use HasFactory;
    protected $table = 'cabors';
    protected $guarded = [];
    // protected $fillable = ['name'];

    /**
     * Get the nomor associated with the Cabor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    //  relasi cabor ke nomor, bisa pakek hasOne / hasMany tergantung kebutuhan
    // kalau hasOne return object, kalo hasMany return array
    public function nomor()
    {
        // hasOne(table relasi, foreign_key, primary_key)
        // primaryKey Cabor adalah kolom 'id'
        return $this->hasOne(Nomor::class, 'cabor_id', 'id');
    }
}
