<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalIbadahKategorial extends Model
{
    use HasFactory, HasUUID;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jadwal_ibadah_kategorial';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function ibadahKategorial()
    {
        return $this->belongsTo(IbadahKategorial::class, 'kategorial_id');
    }
}