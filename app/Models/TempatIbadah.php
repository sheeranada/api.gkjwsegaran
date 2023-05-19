<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatIbadah extends Model
{
    use HasFactory, HasUUID;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tempat_ibadah';
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

    public function ibadahMinggu()
    {
        return $this->hasMany(IbadahMinggu::class);
    }
    public function ibadahMingguAnak()
    {
        return $this->hasMany(IbadahMingguAnak::class);
    }
    public function jadwalIbadahMinggu()
    {
        return $this->hasMany(JadwalIbadahMinggu::class);
    }
}