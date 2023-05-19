<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbadahMinggu extends Model
{
    use HasFactory, HasUUID;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ibadah_minggu';
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

    public function tempatIbadah()
    {
        return $this->belongsTo(TempatIbadah::class, 'tempat_ibadah_id');
    }
    public function jadwalIbadahMinggu()
    {
        return $this->hasMany(JadwalIbadahMinggu::class);
    }
}