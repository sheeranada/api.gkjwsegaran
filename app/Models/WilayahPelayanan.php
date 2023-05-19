<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WilayahPelayanan extends Model
{
    use HasFactory, HasUUID;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wilayah_pelayanan';
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

    public function majelisJemaat()
    {
        return $this->belongsTo(MajelisJemaat::class, 'ketua_wilayah');
    }
    public function ibadahKeluarga()
    {
        return $this->hasMany(IbadahKeluarga::class);
    }
}